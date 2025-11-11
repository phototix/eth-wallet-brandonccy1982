<?php
$Year = date("Y");

function getDomainUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $domain = $_SERVER['HTTP_HOST'];
    return $protocol . $domain;
}
$DomainName = getDomainUrl();
$DomainName = strtoupper(trim(str_replace(["https://", "http://", "www."], "", strtolower($DomainName))));

// List of known tool User-Agents to block
$blockAgents = [
    'gobuster',
    'gobuster/3.6',
    'dirb',
    'dirbuster',
    'nikto',
    'sqlmap'
];

// Get the User-Agent string from the request
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

// Check if the User-Agent matches any in the block list
foreach ($blockAgents as $agent) {
    if (strpos($userAgent, $agent) !== false) {
        // Deny access
        header("HTTP/1.1 403 Forbidden");
        exit("Access denied.");
    }
}

// Check if a honeypot page is accessed
$honeypot = '/free-openai-credits';
if (strpos($_SERVER['REQUEST_URI'], $honeypot) !== false) {
    $ip = $_SERVER['REMOTE_ADDR'];
    // Log or block the IP
    file_put_contents('blocked_ips.txt', $ip . "\n", FILE_APPEND);
    header("HTTP/1.1 403 Forbidden");
    exit("Access denied.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="have-i-been-pwned-verification" value="dweb_iv01jhw3uywva8cnt4btbk3k">
    <title><?=$DomainName?> - Internet Innovator - <?=$Year?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        header {
            text-align: center;
            margin-bottom: 40px;
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
        }
        .section-title {
            font-size: 1.5rem;
            margin: 40px 0 20px;
        }
        .card img {
            height: 108px;
            object-fit: contain;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to <?=$DomainName?></h1>
        <p>Hi! I'm Brandon Chong, the author of this website. I'm committed to bringing clean and transparent creations to people around me.</p>
        <img src="/kkbuddy.com/aboute-me.jpg" class="img-fluid rounded-circle" alt="Brandon Chong" width="150">
        <p class="mt-3">Love from me to all the internet people out there.</p>
    </header>

    <section>
        <h2 class="section-title">Side Projects for Personal Career</h2>

        <!-- Where you want the widget: -->
        <div class="cf-turnstile" data-sitekey="0x4AAAAAACAD0tWRfMotMj1H"></div>
        <!-- Load the Turnstile API: -->
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card text-center">
                    <a href="https://blog.brandon.my/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/Brandonz-logo.png?version" class="card-img-top p-3" alt="不烂凳子 部落格">
                        <div class="card-body">
                            <h5 class="card-title">不烂凳子 部落格</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://journal.kkbuddy.com/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/jouirnalog-logo.jpg" class="card-img-top p-3" alt="Journalog 小聚部落格">
                        <div class="card-body">
                            <h5 class="card-title">Journalog 小聚部落格</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://edu.webbypage.com/" target="_blank" class="text-decoration-none">
                        <img src="https://edu.webbypage.com/edu.webbypage.com/assets/images/sgroup-webbyEDU-logo.png" class="card-img-top p-3" alt="WebbyEDU">
                        <div class="card-body">
                            <h5 class="card-title">WebbyEDU</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://github.com/brandonccy/webbycms" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/webbypage-logo.png" class="card-img-top p-3" alt="WebbyFrame">
                        <div class="card-body">
                            <h5 class="card-title">WebbyFrame (PHP Framework for Startup)</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://sg-cctv.brandon.my/" target="_blank" class="text-decoration-none">
                        <img src="https://s3.ap-southeast-1.amazonaws.com/img.webbypage.com/wp-content/uploads/2025/06/08174419/smart-cctv-icon-vector-image-can-be-used-smart-home_120816-56820.jpg" class="card-img-top p-3" alt="WebbyFrame">
                        <div class="card-body">
                            <h5 class="card-title">CloudNVR</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://cloud.i-dc.institute/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/idci-logo.png" class="card-img-top p-3" alt="IDCI-Cloud">
                        <div class="card-body">
                            <h5 class="card-title">ICDI Cloud</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://ezy.chat/" target="_blank" class="text-decoration-none">
                        <img src="https://ezy.chat/ezy.chat/logo-color.png" class="card-img-top p-3" alt="SmartBlast">
                        <div class="card-body">
                            <h5 class="card-title">SmartBlast aka (EzyChat)</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://metaverse.webbypage.com/" target="_blank" class="text-decoration-none">
                        <img src="https://s3.ap-southeast-1.amazonaws.com/img.webbypage.com/wp-content/uploads/2025/06/11061706/original-f3140fae98192a91e13c5595fb41d476-e1749622648500.webp" class="card-img-top p-3" alt="元宇宙 Metaverse<">
                        <div class="card-body">
                            <h5 class="card-title">元宇宙 Metaverse</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <section>
        <h2 class="section-title">Recognitions & Partners</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card text-center">
                    <a href="https://aws.amazon.com/activate/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/aws-activate-logo.png" class="card-img-top p-3" alt="AWS Activate Partner">
                        <div class="card-body">
                            <h5 class="card-title">AWS Activate Partner</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://central.mymagic.my/cv/brandonz" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/MaGIC-logo.png" class="card-img-top p-3" alt="MaGIC Alumni">
                        <div class="card-body">
                            <h5 class="card-title">MaGIC Alumni</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/startup-weekend-logo.png" class="card-img-top p-3" alt="StartUp Weekend Alumni">
                    <div class="card-body">
                        <h5 class="card-title">StartUp Weekend Alumni</h5>
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card text-center">
                    <a href="https://www.gather.town/ambassadors#filters" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/gathertown-logo.jpg" class="card-img-top p-3" alt="Gather Town">
                        <div class="card-body">
                            <h5 class="card-title">Gather Town</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://github.com/phototix" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/github-logo.png" class="card-img-top p-3" alt="GitHub">
                        <div class="card-body">
                            <h5 class="card-title">GitHub Repos</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://jvc.jci.cc/web/#/profile?user_id=89427" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/JCIAchiever-logo.png" class="card-img-top p-3" alt="JCI Achiever">
                        <div class="card-body">
                            <h5 class="card-title">JCI Achiever</h5>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/aws-cloud-logo.webp" class="card-img-top p-3" alt="AWS Cloud">
                    <div class="card-body">
                        <h5 class="card-title">AWS Cloud</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/cloudflare-logo.png" class="card-img-top p-3" alt="Cloudflare">
                    <div class="card-body">
                        <h5 class="card-title">Cloudflare</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/google-cloud-logo.png" class="card-img-top p-3" alt="Google Cloud">
                    <div class="card-body">
                        <h5 class="card-title">Google Cloud</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/azure-logo.png" class="card-img-top p-3" alt="Azure Cloud">
                    <div class="card-body">
                        <h5 class="card-title">Azure Cloud</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/alibaba-cloud-logo.png" class="card-img-top p-3" alt="Alibaba Cloud">
                    <div class="card-body">
                        <h5 class="card-title">Alibaba Cloud</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/tencent-cloud-logo.png" class="card-img-top p-3" alt="Tencent Cloud">
                    <div class="card-body">
                        <h5 class="card-title">Tencent Cloud</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/oracle-cloud-logo.png" class="card-img-top p-3" alt="Oracle Cloud">
                    <div class="card-body">
                        <h5 class="card-title">Oracle Cloud</h5>
                    </div>
                </div>
            </div>


        </div>

    </section>

    <section>
        <h2 class="section-title">Media & News</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card text-center">
                    <a href="https://vulcanpost.com/587403/gig88-malaysia-startup-booking-platform-performers/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/vulcanpost-logo.jpg" class="card-img-top p-3" alt="Vulcan Post">
                        <div class="card-body">
                            <h5 class="card-title">Vulcan Post</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card text-center">
                    <a href="https://e27.co/these-17-companies-at-ecasia2016-can-help-20160513/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/e27-logo.png" class="card-img-top p-3" alt="e27">
                        <div class="card-body">
                            <h5 class="card-title">e27</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">Projects & Companies Involved and Worked</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- CJ Wow Shop -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/cjwowshop-logo.png" class="card-img-top p-3" alt="CJ Wow Shop" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">CJ Wow Shop</h5>
                    </div>
                </div>
            </div>

            <!-- Coca-Cola Interactive Screen -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/coke-malaysia-logo.jpg" class="card-img-top p-3" alt="Coca-Cola Interactive Screen" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">Coca-Cola Interactive Screen</h5>
                    </div>
                </div>
            </div>

            <!-- KMSPKS Monastery -->
            <div class="col">
                <div class="card text-center">
                    <a href="https://kmspks.org/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/kms_logo.png" class="card-img-top p-3" alt="KMSPKS Monastery" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">KMSPKS Monastery</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Royal Canin -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/royalcanin-logo.png" class="card-img-top p-3" alt="Royal Canin" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">Royal Canin</h5>
                    </div>
                </div>
            </div>

            <!-- GIG88 -->
            <div class="col">
                <div class="card text-center">
                    <a href="https://www.crunchbase.com/organization/gig88" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/gig88-logo.jpg" class="card-img-top p-3" alt="GIG88" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">GIG88</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- MujurHarta Realty -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/mujurharta-logo.png" class="card-img-top p-3" alt="MujurHarta Realty" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">MujurHarta Realty</h5>
                    </div>
                </div>
            </div>

            <!-- Sealcon Malaysia -->
            <div class="col">
                <div class="card text-center">
                    <a href="https://sealcon.com.my/" target="_blank" class="text-decoration-none">
                        <img src="https://sealcon.com.my/sealcon.com.my/images/sealcon_logo.png" class="card-img-top p-3" alt="SEALCON ENGINEER" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">SEALCON ENGINEER</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- NextCloud -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/nextcloud-logo.png" class="card-img-top p-3" alt="NextCloud" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">NextCloud</h5>
                    </div>
                </div>
            </div>

            <!-- Checkin4u -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/CheckIn-logo.png" class="card-img-top p-3" alt="Checkin4u" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">Checkin4u</h5>
                    </div>
                </div>
            </div>

            <!-- Vidowa Corporate Sdn Bhd -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/vidowa-logo.png" class="card-img-top p-3" alt="Vidowa Corporate Sdn Bhd" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">Vidowa Corporate Sdn Bhd</h5>
                    </div>
                </div>
            </div>

            <!-- Mamagrocer Sdn Bhd -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/mamagrocer-logo.png" class="card-img-top p-3" alt="Mamagrocer Sdn Bhd" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">Mamagrocer Sdn Bhd</h5>
                    </div>
                </div>
            </div>

            <!-- Brandhex Sdn Bhd -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/brandhex.com_logo.png" class="card-img-top p-3" alt="Brandhex Sdn Bhd" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">Brandhex Sdn Bhd</h5>
                    </div>
                </div>
            </div>

            <!-- SL Food Machinery Sdn Bhd -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/sl-machine-logo.jpg" class="card-img-top p-3" alt="SL Food Machinery Sdn Bhd" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">SL Food Machinery Sdn Bhd</h5>
                    </div>
                </div>
            </div>

            <!-- AKPP Sdn Bhd -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/akpp-logo.jpg" class="card-img-top p-3" alt="AKPP Sdn Bhd" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">AKPP Sdn Bhd</h5>
                    </div>
                </div>
            </div>

            <!-- NETe2 Asia -->
            <div class="col">
                <div class="card text-center">
                    <a href="https://www.nete2.io/" target="_blank" class="text-decoration-none">
                        <img src="/kkbuddy.com/nete2asia-logo.png" class="card-img-top p-3" alt="NETe2 Asia" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">NETe2 Asia</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- KiVnta Gateway -->
            <div class="col">
                <div class="card text-center">
                    <img src="/kkbuddy.com/KivntaGateway-logo.jpg" class="card-img-top p-3" alt="KiVnta Gateway" height="48px">
                    <div class="card-body">
                        <h5 class="card-title">KiVnta Gateway</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">E-Commerce</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            <div class="col">
                <div class="card text-center">
                    <a href="https://weiwri.com" target="_blank" class="text-decoration-none">
                        <img src="https://weiwri.com/img/logo-1743514184.jpg" class="card-img-top p-3" alt="Prestashop" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">Hidden Lustful Girl <br>深圳市群方位贸易有限公司</h5>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col">
                <div class="card text-center">
                    <a href="https://home.ezy.chat/prestashop/" target="_blank" class="text-decoration-none">
                        <img src="https://home.ezy.chat/prestashop/img/logo.png" class="card-img-top p-3" alt="Prestashop" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">e-Store <br>电商独立站</h5>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section>
        <h2 class="section-title">Others/Misc</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            <div class="col">
                <a href="https://starlink.webbypage.com" target="_blank" class="text-decoration-none">
                    <div class="card text-center">
                        <img src="/starlink.webbypage.com/starlink-logo.png?v=1" class="card-img-top p-3" alt="Starlink" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">Starlink Cloud Services</h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="https://metaverse.webbypage.com/" target="_blank" class="text-decoration-none">
                    <div class="card text-center">
                        <img src="https://s3.ap-southeast-1.amazonaws.com/img.webbypage.com/wp-content/uploads/2025/06/11061706/original-f3140fae98192a91e13c5595fb41d476-e1749622648500.webp" class="card-img-top p-3" alt="Metaverse" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">Metaverse</h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="https://nft.webbypage.com/" target="_blank" class="text-decoration-none">
                    <div class="card text-center">
                        <img src="/kkbuddy.com/website.png" class="card-img-top p-3" alt="NFT" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">NFT</h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="https://ngo-sample-01.webbypage.com/" target="_blank" class="text-decoration-none">
                    <div class="card text-center">
                        <img src="/kkbuddy.com/website.png" class="card-img-top p-3" alt="Non-Profit-Web-01" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">Non-Profit-Web-01</h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="https://ngo-sample-02.webbypage.com/" target="_blank" class="text-decoration-none">
                    <div class="card text-center">
                        <img src="/kkbuddy.com/website.png" class="card-img-top p-3" alt="Non-Profit-Web-02" height="48px">
                        <div class="card-body">
                            <h5 class="card-title">Non-Profit-Web-02</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>
    
    <footer>
        <p>KKBuddy & Brandon.my © 2008 - <?=$Year?></p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>