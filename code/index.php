<?php
$referer = $_SERVER['HTTP_REFERER'] ?? '';
$requiredDomain = 'https://bbmkts.com/';

if (!$referer || strpos($referer, $requiredDomain) !== 0) {
    echo '<style>
.card {
  overflow: hidden;
  position: relative;
  background-color: #ffffff;
  text-align: left;
  border-radius: 0.5rem;
  max-width: 290px;
  box-shadow:
    0 20px 25px -5px rgba(0, 0, 0, 0.1),
    0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.header {
  padding: 1.25rem 1rem 1rem 1rem;
  background-color: #ffffff;
}

.image {
  display: flex;
  margin-left: auto;
  margin-right: auto;
  background-color: #fee2e2;
  flex-shrink: 0;
  justify-content: center;
  align-items: center;
  width: 3rem;
  height: 3rem;
  border-radius: 9999px;
}

.image svg {
  color: #dc2626;
  width: 1.5rem;
  height: 1.5rem;
}

.content {
  margin-top: 0.75rem;
  text-align: center;
}

.title {
    font-family: Roboto, sans-serif;
  color: #111827;
  font-size: 1.5rem;
  font-weight: 600;
  line-height: 1.5rem;
}

.message {
    font-family: Roboto, sans-serif;
  margin-top: 0.5rem;
  color: #000000ff;
  font-size: 1rem;
  line-height: 1.25rem;
}

.actions {
  margin: 0.75rem 1rem;
  background-color: #f9fafb;
}

.desactivate {
  display: inline-flex;
  padding: 0.5rem 1rem;
  background-color: #dc2626;
  color: #ffffff;
  font-size: 1rem;
  line-height: 1.5rem;
  font-weight: 500;
  justify-content: center;
  width: 100%;
  border-radius: 0.375rem;
  border-width: 1px;
  border-color: transparent;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

button {
  cursor: pointer;
}
</style>

<center>
<div class="card">
  <div class="header">
    <div class="image">
      <svg
        aria-hidden="true"
        stroke="currentColor"
        stroke-width="1.5"
        viewBox="0 0 24 24"
        fill="none"
      >
        <path
          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"
          stroke-linejoin="round"
          stroke-linecap="round"
        ></path>
      </svg>
    </div>
    <div class="content">
      <span class="title">Token Không Hợp Lệ</span>
      <p class="message">
        Vui lòng Get Link mới Để nhận Token Mới
      </p>
    </div>
    <div class="actions">
        <a href="https://gmvmoba.com">
      <button class="desactivate" type="button">Get Link</button></a>
    </div>
    <script>
    setTimeout(function() {
        window.location.href = "https://gmvmoba.com";
    }, 1000);
</script>
  </div>
</div>
</center>';
  exit;
}





<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Code Free</title>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700,900">
    
   
    
    
    <style>
        body
        
        
        
        
         {
            background: linear-gradient(120deg, rgba(79, 222, 104, 0.74), rgba(96, 224, 219, 0.74));
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        #Dialog {
            width: 400px;
            height: 630px;
            background: white;
            box-shadow: 10px 10px 200px rgba(0, 255, 225, 0.65);
            border-radius: 32px;
            text-align: center;
        }
        
        #Label_GetKeyFree {
            color: #191717;
            font-size: 32px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            padding-top: 30px;
        }
        
        #GetKeyViewTextBox,
        #GetKeyBtn_Label,
        #GetNewKey_Label {
            width: 250px;
            height: 60px;
            border-radius: 20px;
            display: table;
            margin: 20px auto;
            transition: 0.2s;
            cursor: pointer;
            text-align: center;
            color: black;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border: none;
        }
        
            #GetNewKey_Label1 {
            width: 250px;
            height: 60px;
            border-radius: 20px;
            display: table;
            margin: 20px auto;
            transition: 0.2s;
            cursor: pointer;
            text-align: center;
            color: black;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border: none;
        }
        
        #GetNewKey_Label2 {
            width: 250px;
            height: 60px;
            border-radius: 20px;
            display: table;
            margin: 20px auto;
            transition: 0.2s;
            cursor: pointer;
            text-align: center;
            color: black;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border: none;
        }
        
        #GetNewKey_Label3 {
            width: 250px;
            height: 60px;
            border-radius: 20px;
            display: table;
            margin: 20px auto;
            transition: 0.2s;
            cursor: pointer;
            text-align: center;
            color: black;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            border: none;
        }
        
        #GetKeyViewTextBox {
            background: #5fff24;
        }
        
        #GetKeyBtn_Label {
            background: #8affc7;
        }
        
        #GetKeyBtn_Label:hover {
            background: #ff0d3f;
        }

        #GetNewKey_Label {
            background: #8affc7;
        }
        
        
        
            #GetNewKey_Label1 {
            background: #8affc7;
        }
        
     #GetNewKey_Label2 {
            background: #ff153d;
        }
        
     #GetNewKey_Label3 {
            background: #8affc7;
        }
        
        #GetNewKey_Label:hover {
            background: #ff0d3f;
        }
    </style>
</head>
<body>
    <div id="Dialog">
        <div id="Label_GetKeyFree">Code của bạn là</div>
       
Lấy code gửi Discord cho admin để được hack free nhé
          <input type="text" id="GetKeyViewTextBox" name="GetKeyViewTextBox" readonly value="" />        <button type="button" id="GetKeyBtn_Label">Sao Chép Code</button>

    </div>

    <script>
        document.getElementById("GetKeyBtn_Label").addEventListener("click", function() {
            var keyInput = document.getElementById("GetKeyViewTextBox");
            keyInput.select();
            document.execCommand("copy");
     
            Swal.fire({
  title: "Sucess!",
  text: "Cảm ơn bạn đã lấy code!",
  icon: "success"
});
           
              
                    });

        document.getElementById("GetNewKey_Label").addEventListener("click", function() {
            window.location = 'tudong.php';
        });
                document.getElementById("GetNewKey_Label1").addEventListener("click", function() {
            window.location = 'telegram1.php';
        });
document.getElementById("GetNewKey_Label2").addEventListener("click", function() {
            window.location = 'telegram.php';
        });
document.getElementById("GetNewKey_Label3").addEventListener("click", function() {
            window.location = 'telegram.php';
        });

        
    </script>
<script>
    function generateRandomCode(length = 12) {
        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let code = "";
        for (let i = 0; i < length; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return code;
    }

    async function getUserIP() {
        try {
            const res = await fetch("https://api.ipify.org?format=json");
            const data = await res.json();
            return data.ip; 
        } catch (e) {
            return "0.0.0.0";
        }
    }

    window.onload = async function () {
        const prefix = "GMVMOBA_";
        const random = generateRandomCode(16);
        const ip = await getUserIP();

        const finalCode = `${prefix}${random}_${ip}`;

        document.getElementById("GetKeyViewTextBox").value = finalCode;
    };

    document.getElementById("GetKeyBtn_Label").addEventListener("click", function() {
        var keyInput = document.getElementById("GetKeyViewTextBox");
        keyInput.select();
        document.execCommand("copy");

        Swal.fire({
            title: "Success!",
            text: "Đã sao chép code!",
            icon: "success"
        });
    });
</script>


<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"6bc47083d9c545718c30ba8b05223eaa","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>
</html>

</div>
<div class="container" data-v-a1b911ec style="margin-top: 90%;">
                                <div class="guild-video section-box" data-v-a1b911ec>
                                    <div class="row" data-v-a1b911ec>
                                        <div class="col" data-v-a1b911ec>
                                            <h2 class="guild-title" data-v-a1b911ec>Video khác</h2>
                                            <div class="video-box" data-v-a1b911ec>
                                                <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/wLlQHI2c-6o?autoplay=1&mute=1&playsinline=1"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen>
                                                </iframe>
                                                 <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/1pSCtM43W4w?autoplay=1&mute=1&playsinline=1"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen>
                                                </iframe>
                                                 <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/3W8dw2uN794?autoplay=1&mute=1&playsinline=1"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen>
                                                </iframe>
                                                 <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/Mix--KEPgjY?autoplay=1&mute=1&playsinline=1"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen>
                                                </iframe>
                                                 <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/XBMKK2JcT2Q?autoplay=1&mute=1&playsinline=1"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen>
                                                </iframe>
                                                 <iframe width="560" height="315"
                                                    src="https://www.youtube.com/embed/qcceYX0Myxs?autoplay=1&mute=1&playsinline=1"
                                                    title="YouTube video player"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen>
                                                </iframe>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<script>

document.addEventListener("selectstart", e => e.preventDefault());
document.addEventListener("contextmenu", e => e.preventDefault());
document.addEventListener("copy", e => {
    e.preventDefault();
});

document.addEventListener("keydown", e => {
    if (
        (e.ctrlKey && ["c","u","s"].includes(e.key.toLowerCase())) ||
        (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === "i") ||
        e.key === "F12"
    ) {
        e.preventDefault();
    }
});

document.addEventListener("touchstart", function(e) {
    this.longPressTimer = setTimeout(() => {
        if (
            e.target.tagName !== "BUTTON" &&
            e.target.tagName !== "A" &&
            e.target.tagName !== "INPUT" &&
            e.target.tagName !== "TEXTAREA"
        ) {
            e.preventDefault();
        }
    }, 500);
}, { passive: false });

document.addEventListener("touchend", function() {
    clearTimeout(this.longPressTimer);
});
</script>

<script>
    function resetRef() {
        const cleanUrl = window.location.href.split('#')[0];
        const meta = document.createElement("meta");
        meta.name = "referrer";
        meta.content = "no-referrer";
        document.head.appendChild(meta);

        window.location.replace(cleanUrl);
    }

    let sessionId = sessionStorage.getItem("homeSession");

    if (!sessionId) {
        resetRef();
    }
</script>


?>
