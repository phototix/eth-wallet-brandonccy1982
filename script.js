document.addEventListener('DOMContentLoaded', function() {
    // Your Etherscan API configuration
    const ETHERSCAN_API_KEY = 'DH4XZHQQHAD78JEUKBMDGNVTXUB621UXNQ';
    const ETHERSCAN_BASE_URL = 'https://api.etherscan.io/v2/api';
    
    const addresses = [
        {
            id: 1,
            address: '0x88fb219E59E6E94640506ae635700135a5B1C1ba',
            balanceElement: document.getElementById('balance-1'),
            usdElement: document.getElementById('usd-value-1'),
            loadingElement: document.getElementById('loading-1'),
            errorElement: document.getElementById('error-1')
        }
    ];
    
    const totalBalanceElement = document.getElementById('total-balance');
    const totalUsdElement = document.getElementById('total-usd-value');
    const refreshButton = document.getElementById('refresh-btn');
    
    let ethPrice = 0;
    
    // Function to fetch all balances
    async function fetchAllBalances() {
        // Reset UI
        addresses.forEach(addr => {
            addr.loadingElement.style.display = 'block';
            addr.errorElement.style.display = 'none';
            addr.balanceElement.textContent = '--';
            addr.usdElement.textContent = '--';
        });
        
        totalBalanceElement.textContent = '--';
        totalUsdElement.textContent = '--';
        
        try {
            // Fetch ETH price first
            ethPrice = await fetchETHPrice();
            
            // Fetch balances for all addresses
            const balancePromises = addresses.map(addr => fetchBalance(addr));
            await Promise.all(balancePromises);
            
            // Calculate and display totals
            calculateTotals();
            
        } catch (error) {
            console.error('Error in fetchAllBalances:', error);
        }
    }
    
    // Function to fetch balance for a single address using Etherscan API
    async function fetchBalance(addressObj) {
        try {
            const balanceEth = await fetchFromEtherscan(addressObj.address);
            
            if (balanceEth !== null) {
                // Display balance
                addressObj.balanceElement.textContent = balanceEth.toFixed(6);
                
                // Calculate and display USD value
                const usdValue = balanceEth * ethPrice;
                addressObj.usdElement.textContent = `$${usdValue.toFixed(2)} USD`;
                
                // Store the balance for total calculation
                addressObj.currentBalance = balanceEth;
            } else {
                throw new Error(`Failed to fetch balance for address ${addressObj.id}`);
            }
        } catch (error) {
            console.error(`Error fetching balance for address ${addressObj.id}:`, error);
            addressObj.errorElement.textContent = 'Error fetching balance. Please try again.';
            addressObj.errorElement.style.display = 'block';
            addressObj.currentBalance = 0;
        } finally {
            addressObj.loadingElement.style.display = 'none';
        }
    }
    
    // Fetch balance using your Etherscan API key
    async function fetchFromEtherscan(address) {
        try {
            const url = `${ETHERSCAN_BASE_URL}?apikey=${ETHERSCAN_API_KEY}&chainid=1&module=account&action=balance&address=${address}&tag=latest`;
            
            console.log(`Fetching balance for ${address}...`);
            const response = await fetch(url);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            
            // Check if the API returned a successful response
            if (data.status === '1' && data.message === 'OK') {
                const balanceWei = data.result;
                const balanceEth = balanceWei / 1e18;
                console.log(`Balance for ${address}: ${balanceEth} ETH`);
                return balanceEth;
            } else {
                console.warn(`Etherscan API error for ${address}:`, data.message, data.result);
                return null;
            }
        } catch (error) {
            console.error(`Etherscan fetch failed for ${address}:`, error);
            return null;
        }
    }
    
    // Fetch ETH price
    async function fetchETHPrice() {
        try {
            // Try CoinGecko first
            const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=ethereum&vs_currencies=usd');
            const data = await response.json();
            
            if (data.ethereum && data.ethereum.usd) {
                return data.ethereum.usd;
            } else {
                throw new Error('CoinGecko price data unavailable');
            }
        } catch (error) {
            console.warn('CoinGecko failed, trying alternative price API...');
            
            // Fallback to CoinCap API
            const fallbackResponse = await fetch('https://api.coincap.io/v2/assets/ethereum');
            const fallbackData = await fallbackResponse.json();
            
            if (fallbackData.data && fallbackData.data.priceUsd) {
                return parseFloat(fallbackData.data.priceUsd);
            } else {
                // Default fallback price
                console.warn('All price APIs failed, using default price');
                return 3000; // Default ETH price
            }
        }
    }
    
    // Calculate and display totals
    function calculateTotals() {
        let totalETH = 0;
        let allLoaded = true;
        
        addresses.forEach(addr => {
            if (addr.currentBalance !== undefined) {
                totalETH += addr.currentBalance;
            } else {
                allLoaded = false;
            }
        });
        
        if (allLoaded) {
            totalBalanceElement.textContent = totalETH.toFixed(6);
            const totalUSD = totalETH * ethPrice;
            totalUsdElement.textContent = `$${totalUSD.toFixed(2)} USD`;
        }
    }
    
    // Fetch all balances on page load
    fetchAllBalances();
    
    // Add event listener to refresh button
    refreshButton.addEventListener('click', fetchAllBalances);
    
    // Auto-refresh every 60 seconds
    setInterval(fetchAllBalances, 60000);
});