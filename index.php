<?php

if(isset($_POST['submit'])) {
    // credentials from your developer account
    $consumerKey = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
    $consumerSecret = "xxxxxxxxxxxxxxxxxxxxxxxxx";
    $auth = base64_encode($consumerKey . ":" . $consumerSecret);
    
    // Get phone number and amount from the form
    $phone_number = $_POST['phonenumber'];
    $amount = $_POST['amount'];

    $data = json_encode(array(
        "phone_number" => $phone_number,
        "amount" => $amount
    ));

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.statum.co.ke/api/v2/airtime',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
            "Authorization: Basic $auth",
            "Content-Type: application/json"
        ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airtime purchase</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid grid-cols-1">
                <div class="w-full max-w-lg mx-auto my-4 bg-white shadow-xl rounded-xl">
                    <div class="p-6">
                        <div>
                            <div class="mt-3 text-left sm:mt-5">
                                <img alt="team"
                                    class="flex-shrink-0 object-cover object-center w-20 h-20 mx-auto -mt-8 rounded-full shadow-xl aboslute"
                                    src="./images/mpesa.png">
                                <center>
                                    <span class="mb-8 text-xs font-semibold tracking-widest text-blue-600 uppercase" style="color:#07933c!important;">
                                        Airtime Vendor</span>

                                </center>
                                <br>
                                <span class="mb-2 text-xs font-semibold tracking-widest text-blue-600 uppercase" style="color:#07933c!important;">>Buy
                                    Airtime for Safaricom,Airtel and Telcom</span>
                                <br>
                                <hr>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2">
                            <form action="./index.php" method="POST">
                            <div>
                                <br>
                                <label for="contact" class="block text-sm font-medium text-neutral-600"> Phone Number
                                </label>
                                <div class="mt-1">
                                    <input id="contact" name="phonenumber" type="phone" 
                                        placeholder="254"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                    <div data-lastpass-icon-root="true"
                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <br>
                                <label for="amount" class="block text-sm font-medium text-neutral-600"> Amount
                                </label>
                                <div class="mt-1">
                                    <input id="amount" name="amount" type="text"
                                        placeholder="Enter amount"
                                        class="block w-full px-5 py-3 text-base text-neutral-600 placeholder-gray-300 transition duration-500 ease-in-out transform border border-transparent rounded-lg bg-gray-50 focus:outline-none focus:border-transparent focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-300">
                                    <div data-lastpass-icon-root="true"
                                        style="position: relative !important; height: 0px !important; width: 0px !important; float: left !important;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-2 mt-0 lg:mt-6 max-w-7xl">
                            <div class="mt-3 rounded-lg sm:mt-0 sm:ml-3">
                                <button
                                    type="submit" name="submit"
                                    class="items-center block px-10 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    style="background-color:#07933c!important;">Buy Now</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>