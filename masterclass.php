<?php

// Masterclass.php

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <meta name="robots" content="noindex, nofollow" />

  <title>MegaTrades Ebook</title>

  <!-- Favicon -->

  <link rel="icon" type="image/png" href="https://i.ibb.co/KpkwTMZ5/image-1762122409962-2-removebg-preview.png">

  <meta name="theme-color" content="#000000">

  <style>

    :root {

      --primary: #1a73e8; /* Golden blue */

      --accent: #ff0033;  /* Rich red */

      --dark: #0f1113;

      --card: #161719;

      --text: #eef1f3;

      --muted: #bfc4c8;

      --radius: 12px;

    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {

      background: var(--dark);

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

      border-radius: var(--radius);

      box-shadow: 0 0 20px rgba(0,0,0,0.6);

      max-width: 500px;

      width: 100%;

      text-align: left;

      border: 1px solid rgba(255,255,255,0.05);

    }

    .logo {

      width: 80px;

      margin-bottom: 1rem;

      border-radius: 10px;

    }

    h2 {

      margin-bottom: 1rem;

      color: var(--primary);

      font-weight: 700;

      font-size: 1.5rem;

    }

    h3 {

      margin: 1rem 0;

      color: var(--accent);

      font-size: 1.2rem;

    }

    p {

      margin-bottom: 1rem;

      line-height: 1.6;

    }

    ul {

      margin-bottom: 1rem;

      padding-left: 1.2rem;

    }

    ul li {

      margin-bottom: 0.5rem;

    }

    .price {

      font-weight: bold;

      color: var(--primary);

      margin-bottom: 1rem;

    }

    .button {

      display: block;

      width: 100%;

      padding: 0.9rem;

      background: linear-gradient(180deg, var(--primary), var(--accent));

      color: #fff;

      border: none;

      border-radius: 8px;

      cursor: pointer;

      font-size: 1rem;

      font-weight: 600;

      text-align: center;

      text-decoration: none;

      box-shadow: 0 6px 20px rgba(255,0,0,0.2);

      transition: transform 0.2s ease, box-shadow 0.3s ease;

    }

    .button:hover {

      transform: scale(1.05);

    }

    @media (max-width: 500px) {

      .container { padding: 1.8rem; }

      h2 { font-size: 1.3rem; }

    }

  </style>

</head>

<body>

  <div class="container">

    <img src="https://i.ibb.co/KpkwTMZ5/image-1762122409962-2-removebg-preview.png" alt="MegaTrades Logo" class="logo" />

    <h2>My New Trading Journal eBook Is Finally Here! 📘🔥</h2>

    <h3>MegaTrades personal eBook</h3>

    <p>This eBook is more than just a place to write down your trades — it’s a full learning guide built to help you grow as a trader.</p>

    <ul>

      <li>✅ How to analyze the market better</li>

      <li>✅ How to understand trading patterns and chart movements</li>

      <li>✅ How to manage your emotions and risk wisely</li>

      <li>✅ Powerful trading strategies to make smarter moves</li>

    </ul>

    <p>It’s written in a simple, clear way — easy to understand for everyone, whether you’re just starting or already trading.</p>

    <p>Yes, trading involves risk — but knowledge, structure, and discipline are what give you the edge to grow and earn more over time.</p>

    <p>🔥 Learn deeply. Trade wisely. Grow steadily.</p>

    <p class="price">Personal Trading eBook<br>

    Original Price: ₦120,000<br>

    Discount Price: <strong>₦55,000</strong></p>

    <a href="payment.php" class="button">Get eBook</a>

  </div>

</body>

</html>