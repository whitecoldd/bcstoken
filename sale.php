<?php
session_start();
// Check existence of id parameter before processing further

require_once './incs/dbh.inc.php';

$sql = "SELECT * FROM token";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCS Token</title>

    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/saleStyles.css">
</head>

<body>
    <div class="burderMenuExitBG"></div>

    <header class="header">
        <a href="index.php">
            <div class="header_logo">
                <img src="img/logo.svg" alt="">
            </div>
        </a>



        <div class="header_btns">
            <button class="white_paper"><span>Connect Wallet</span></button>
        </div>
    </header>

    <main class="main">

        <div class="bg bg1"><img src="img/bg.png" alt=""></div>
        <div class="bg bg2"><img src="img/bg.png" alt=""></div>
        <div class="bg bg3"><img src="img/bg.png" alt=""></div>
        <div class="bg bg4"><img src="img/bg.png" alt=""></div>

        <div class="ClaimBcs">
            <h1>Claim Your bcs</h1>
            <div class="ClaimBcs_subtitle timer timer-1">
                <div class="timer__items">
                    <div class="timer__item timer__days">00</div>&nbsp;DAYS and&nbsp;
                    <div class="timer__item timer__hours">00</div>:
                    <div class="timer__item timer__minutes">00</div>:
                    <div class="timer__item timer__seconds">00</div>
                </div>
                <div class="timer__result"></div>
            </div>
            <p class="ClaimBcs_sub_text">till the vesting end!</p>

            <div class="ClaimBcs_payAddress">
                <div class="ClaimBcs_payAddress_">
                    <?php

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <p class="ClaimBcs_payAddress_title">Vesting contract address</p>
                            <p class="ClaimBcs_payAddress_code"><?php echo $row['vesting_address']; ?></p>
                </div>
                <div class="ClaimBcs_payAddress_">
                    <p class="ClaimBcs_payAddress_title">BCS contract address</p>
                    <p class="ClaimBcs_payAddress_code"><?php echo $row['bcs']?>;
                                                    
                                                </p>
                                                <?php
                                                if (isset($_SESSION['adminname'])) {?>
                   <a class="white_paper" href="adminedit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <?php
                                                }
                }
            }
        
                ?>
                </div>
                
            </div>
        </div>

        <div class="wallet_form">
            <form action="#" method="post">
                <div class="walletForm_input">
                    <span>Your Tokens in Contract:</span>
                    <input type="text" name="input1" value="0 BCS">
                    <div class="walletForm_input_img">
                        <img src="img/Logo_input.svg" alt="">
                    </div>
                </div>
                <div class="walletForm_input">
                    <span>Avaible for Claim:</span>
                    <input type="text" name="input2" value="0 BCS">
                    <div class="walletForm_input_img">
                        <img src="img/Logo_input.svg" alt="">
                    </div>
                </div>
                <div class="wallet_form_underInputsText">
                    <span>Avaible for Claim Weekly :</span>
                    <p>0 BCS / WEEK</p>
                </div>
                <button disabled type="submit"><span>Wallet is not conntected</span></button>
                <span class="walletForm_notify">*As soon as you claim, your tokens will be transferred to the connected wallet. Make sure you have added BCS token there</span>
            </form>
        </div>

        <div class="instructions">
            <h2>BCS Token Claim Instructions</h2>
            <ol>
                <li>Press connect MetaMask on the top of the ‘claim page’ The button will start to display your address as soon as it’s
                    connected.</li>
                <li>Make sure you have a sufficient amount of ETH to cover the gas fee.</li>
                <li>Find the ‘available for claim’ field in the 'claim form' and consider claiming.</li>
            </ol>
        </div>
    </main>

    <footer class="footer">
        <div class="footer_bg"></div>

        <div class="header_logo">
            <img src="img/logo.svg" alt="">
        </div>

        <div class="footer_text">BCS Token is a utility token of the BICAS gaming platform built on smart contracts.
        </div>

        <div class="footer_subscribe">
            <input class="footer_subscr_input" type="email" placeholder="Email">
            <input type="submit" value="SUBSCRIBE">
        </div>

        <div class="footer_socials">
            <div class="footer_social_item">
                <a href="#">
                    <div>
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M30 15.0963C30 6.75688 23.2832 0 15.0068 0C6.71683 0 0 6.75688 0 15.0963C0 22.6239 5.48564 28.8716 12.6539 30V19.4587H8.85089V15.0963H12.6539V11.7661C12.6539 7.98165 14.8974 5.88991 18.3174 5.88991C19.959 5.88991 21.6689 6.1789 21.6689 6.1789V9.8945H19.7811C17.9207 9.8945 17.3324 11.0642 17.3324 12.2477V15.0826H21.4911L20.8208 19.445H17.3187V30C24.5144 28.8716 30 22.6239 30 15.0963Z" fill="white" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="footer_social_item">
                <a href="#">
                    <div>
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="white" />
                            <path d="M6 24.0425L7.28774 19.217C6.55189 17.9009 6.16981 16.4151 6.16981 14.9151C6.16981 10.0047 10.1745 6 15.0849 6C19.9953 6 24 10.0047 24 14.9151C24 19.8255 19.9953 23.8302 15.0849 23.8302C13.6132 23.8302 12.1557 23.4623 10.8538 22.7547L6 24.0425ZM11.0943 20.9292L11.3915 21.1132C12.5094 21.7783 13.783 22.1321 15.0849 22.1321C19.0755 22.1321 22.316 18.8915 22.316 14.9009C22.316 10.9104 19.0755 7.66981 15.0849 7.66981C11.0943 7.68396 7.85377 10.9245 7.85377 14.9151C7.85377 16.2311 8.2217 17.533 8.91509 18.6651L9.09906 18.9764L8.37736 21.6651L11.0943 20.9292Z" fill="#6B2046" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3962 16.1463C18.0283 15.9199 17.5471 15.6793 17.1226 15.8633C16.7971 16.0048 16.5849 16.5143 16.3585 16.7831C16.2452 16.9246 16.1179 16.9388 15.9481 16.868C14.7028 16.3727 13.7547 15.5378 13.0613 14.3916C12.9481 14.2077 12.9622 14.0803 13.1037 13.9105C13.316 13.6699 13.5707 13.3869 13.6273 13.0614C13.6839 12.736 13.5283 12.3539 13.3868 12.0567C13.2169 11.6888 13.0188 11.151 12.6368 10.9388C12.2971 10.7407 11.8443 10.8539 11.533 11.1086C11.0094 11.5473 10.7405 12.2124 10.7547 12.8916C10.7547 13.0756 10.783 13.2737 10.8254 13.4577C10.9386 13.8963 11.1368 14.3067 11.3632 14.7029C11.533 15.0001 11.7311 15.2831 11.9292 15.5661C12.5943 16.4718 13.4292 17.2501 14.3773 17.8444C14.8585 18.1416 15.3679 18.3963 15.9056 18.5661C16.5 18.7643 17.0377 18.9765 17.6886 18.8492C18.3679 18.7218 19.033 18.2973 19.3019 17.6463C19.3868 17.4482 19.4151 17.236 19.3726 17.0378C19.316 16.5992 18.7358 16.3586 18.3962 16.1463Z" fill="#6B2046" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="footer_social_item">
                <a href="#">
                    <div>
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="white" />
                            <path d="M24.9096 9.80775C24.3374 10.0665 23.7049 10.234 23.0874 10.3253C23.3736 10.2796 23.8103 9.74686 23.9759 9.51852C24.232 9.18362 24.4579 8.81828 24.5783 8.40727C24.5934 8.37683 24.6084 8.33116 24.5783 8.31594C24.5331 8.30072 24.5181 8.30072 24.488 8.33116C23.7952 8.71172 23.0874 8.97051 22.3344 9.1684C22.2742 9.18362 22.229 9.1684 22.1838 9.12273C22.1236 9.04662 22.0634 8.98573 21.9881 8.92484C21.6718 8.65083 21.3254 8.43772 20.9489 8.27027C20.4369 8.05716 19.8948 7.96582 19.3376 8.01149C18.8105 8.04193 18.2834 8.19416 17.8165 8.45294C17.3497 8.6965 16.928 9.04662 16.5816 9.47285C16.2353 9.89908 15.9792 10.4166 15.8437 10.9647C15.7232 11.4822 15.7232 11.9998 15.7985 12.5326C15.8136 12.6239 15.7985 12.6391 15.7232 12.6239C12.7565 12.1825 10.3017 11.1017 8.29879 8.80306C8.23855 8.6965 8.19337 8.6965 8.11807 8.80306C7.24461 10.1274 7.66628 12.2586 8.76564 13.2937C8.91624 13.4307 9.06683 13.5677 9.21743 13.7047C9.15719 13.7199 8.43433 13.6438 7.78676 13.2937C7.6964 13.2328 7.65122 13.2633 7.65122 13.3698C7.63616 13.5068 7.65122 13.6438 7.68134 13.7961C7.847 15.1356 8.76564 16.3839 10.0307 16.8558C10.1813 16.9167 10.3469 16.9776 10.5126 17.008C10.2264 17.0689 9.92524 17.1146 9.11201 17.0537C9.00659 17.0385 8.97648 17.0841 9.00659 17.1907C9.62404 18.8956 10.9644 19.3979 11.9583 19.6872C12.0938 19.7176 12.2294 19.7176 12.3649 19.7481C12.3498 19.7633 12.3498 19.7633 12.3348 19.7785C12.0035 20.2961 10.8589 20.6766 10.3168 20.8593C9.33791 21.2094 8.28373 21.3616 7.25967 21.2551C7.09401 21.2246 7.06389 21.2399 7.01871 21.2551C6.97353 21.2855 7.01871 21.316 7.06389 21.3616C7.27473 21.4987 7.48556 21.6204 7.6964 21.7422C8.34397 22.0923 9.03671 22.3663 9.74452 22.5642C13.4191 23.5841 17.5605 22.8382 20.3164 20.0677C22.485 17.8909 23.238 14.8921 23.238 11.878C23.238 11.7562 23.3736 11.6953 23.4639 11.6345C24.0211 11.2082 24.488 10.6907 24.9096 10.1274C25 10.0056 25 9.88386 25 9.83819C25 9.82297 25 9.82297 25 9.82297C24.9849 9.76208 24.9849 9.7773 24.9096 9.80775Z" fill="#6B2046" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="footer_social_item">
                <a href="#">
                    <div>
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="white" />
                            <path d="M24 13.0702C24 10.8262 22.23 9 20.055 9H9.945C7.77 9 6 10.8262 6 13.0702V17.9143C6 20.1738 7.77 22 9.945 22H20.04C22.215 22 23.985 20.1738 23.985 17.9298V13.0702H24ZM18.06 15.856L13.53 18.1774C13.35 18.2702 12.75 18.1464 12.75 17.9298V13.194C12.75 12.9774 13.365 12.8536 13.53 12.9619L17.865 15.3917C18.06 15.4845 18.24 15.7631 18.06 15.856Z" fill="#6A2046" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="footer_social_item">
                <a href="#">
                    <div>
                        <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 30C23.2843 30 30 23.2843 30 15C30 6.71573 23.2843 0 15 0C6.71573 0 0 6.71573 0 15C0 23.2843 6.71573 30 15 30Z" fill="white" />
                            <path d="M10.5767 15.8367L12.1869 20.2574C12.1869 20.2574 12.3882 20.671 12.6038 20.671C12.8194 20.671 16.0257 17.3625 16.0257 17.3625L19.5912 10.5317L10.6341 14.6956L10.5767 15.8367Z" fill="#965074" />
                            <path d="M12.712 16.9707L12.4029 20.2291C12.4029 20.2291 12.2735 21.2276 13.2799 20.2291C14.2862 19.2307 15.2495 18.4608 15.2495 18.4608" fill="#B796A7" />
                            <path d="M10.606 15.9946L7.29368 14.9242C7.29368 14.9242 6.89782 14.7649 7.02529 14.4037C7.05153 14.3292 7.10446 14.2658 7.2628 14.1569C7.99672 13.6495 20.847 9.06829 20.847 9.06829C20.847 9.06829 21.2098 8.94702 21.4238 9.02768C21.4768 9.04394 21.5244 9.07385 21.5619 9.11435C21.5993 9.15486 21.6253 9.2045 21.637 9.25822C21.6602 9.35309 21.6698 9.45069 21.6658 9.54821C21.6647 9.63257 21.6545 9.71076 21.6466 9.83337C21.5684 11.0859 19.2263 20.4338 19.2263 20.4338C19.2263 20.4338 19.0861 20.9808 18.5841 20.9995C18.4607 21.0035 18.3378 20.9827 18.2226 20.9386C18.1075 20.8944 18.0025 20.8277 17.9139 20.7424C16.9287 19.9018 13.5234 17.6319 12.771 17.1327C12.754 17.1212 12.7397 17.1063 12.7291 17.0889C12.7184 17.0715 12.7116 17.052 12.7092 17.0318C12.6987 16.9791 12.7564 16.914 12.7564 16.914C12.7564 16.914 18.6859 11.6863 18.8436 11.1375C18.8559 11.095 18.8097 11.074 18.7477 11.0926C18.3539 11.2363 11.5269 15.5126 10.7734 15.9845C10.7191 16.0008 10.6618 16.0043 10.606 15.9946Z" fill="#692046" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <a href="https://mix-technology.com/">
            <div class="footer_copyright">
                <p>Powered by</p>
                <div class="footer_copyright_logo">
                    <img src="img/footer_copyright_logo.svg" alt="">
                </div>
            </div>
        </a>
    </footer>


    <div class="modal_window">
        <div class="modal_close">
            <img src="img/modal_close.png" alt="">
        </div>

        <h3>Choose wallet</h3>
        <div class="modal_metamask">
            <div class="modal_metamask_img">
                <img src="img/MM-Icon.png" alt="">
            </div>
            <span class="modal_metamask_text">Connect Metamask</span>
        </div>
    </div>


    <script src="js/script_sale.js"></script>

</body>

</html>