<?php

// payment.php

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title> Personal Trading eBook</title>

  <meta name="robots" content="noindex, nofollow" />

  <meta name="theme-color" content="#000000">

  <style>

    :root {

      --bg: #0f1113;

      --card: #161719;

      --text: #eef1f3;

      --muted: #bfc4c8;

      --primary: #1a73e8; /* Blue */

      --accent: #ff0033;  /* Red */

    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {

      background: var(--bg);

      color: var(--text);

      font-family: 'Poppins', sans-serif;

      display: flex;

      justify-content: center;

      align-items: center;

      min-height: 100vh;

      padding: 20px;

    }

    .container {

      background: var(--card);

      padding: 2.5rem;

      border-radius: 12px;

      box-shadow: 0 0 20px rgba(0,0,0,0.6);

      max-width: 500px;

      width: 100%;

      text-align: left;

    }

    h2 {

      margin-bottom: 1.5rem;

      font-size: 1.4rem;

      color: var(--primary);

    }

    label {

      display: block;

      margin-bottom: 0.5rem;

      font-weight: 500;

    }

    input[type="text"],

    input[type="email"],

    input[type="tel"] {

      width: 100%;

      padding: 0.9rem;

      margin-bottom: 1rem;

      border: 1px solid rgba(255,255,255,0.1);

      border-radius: 8px;

      background-color: #1d1f22;

      color: var(--text);

      font-size: 1rem;

    }

    input::placeholder {

      color: var(--muted);

    }

    .checkbox {

      margin-bottom: 1rem;

    }

    .checkbox input {

      margin-right: 8px;

    }

    .policy {

      font-size: 0.85rem;

      color: var(--muted);

      margin-bottom: 1rem;

    }

    .policy a {

      color: var(--primary);

      text-decoration: underline;

    }

    button {

      width: 100%;

      padding: 0.9rem;

      background-color: var(--primary);

      color: #fff;

      border: none;

      border-radius: 8px;

      cursor: pointer;

      font-size: 1rem;

      font-weight: 600;

      transition: transform 0.2s ease;

    }

    button:hover {

      transform: scale(1.05);

    }

  </style>

</head>

<body>

  <div class="container">

    <h2>MegaTrades Personal Trading eBook</h2>

    <form id="paymentForm">

      <label for="email">Email Address:</label>

      <input type="email" id="email" name="email" placeholder="you@example.com" required />

      <label for="firstName">First Name:</label>

      <input type="text" id="firstName" name="firstName" placeholder="John" required />

      <label for="lastName">Last Name:</label>

      <input type="text" id="lastName" name="lastName" placeholder="Doe" required />

      <label for="phone">Phone Number:</label>

      <input type="tel" id="phone" name="phone" placeholder="+234..." required />

      <div class="checkbox">

        <label>

          <input type="checkbox" required />

          I accept your terms to proceed

        </label>

      </div>

      <div class="policy">

        <strong>NO REFUND POLICY.</strong><br>

        By subscribing to our program, you hereby accept that all sales are final and you accept our No Refund Policy and are subject to MegaTrades Terms of Service.<br><br>

        If you have any concerns, reach our support team: <a href="mailto:support@megatrades.net">support@megatrades.net</a>

      </div>

      <button type="submit">Subscribe Now</button>

    </form>

  </div>

  <!-- KoraPay Script -->

  <script src="https://korablobstorage.blob.core.windows.net/modal-bucket/korapay-collections.min.js"></script>

  <script>

    document.getElementById('paymentForm').addEventListener('submit', function(e) {

      e.preventDefault();

      const email = this.email.value.trim();

      const firstName = this.firstName.value.trim();

      const lastName = this.lastName.value.trim();

      const phone = this.phone.value.trim();

      if (!email || !firstName || !lastName || !phone) {

        alert('Please fill in all fields.');

        return;

      }

      if (typeof Korapay === 'undefined') {

        alert('Payment service is unavailable. Please try again later.');

        return;

      }

      Korapay.initialize({

        key: 'pk_live_yRJ1XJDqp6P6YjrjY9fargo1LiHgQJrefZ',

        amount: 55000,

        currency: 'NGN',

        reference: 'DenicFX-' + Date.now(),

        customer: {

          name: firstName + ' ' + lastName,

          email: email,

          phone_number: phone

        },

        onClose: () => alert('You closed the payment window.'),

        onSuccess: () => {

          window.location.href = 'https://t.me/+SdoT8IlB2342OGVk';

        }

      });

    });

  </script>

</body>

</html>