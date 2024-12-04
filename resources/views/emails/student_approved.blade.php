<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Kenya Safety Tech Medical Training</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #2c3e50;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .email-header {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 30px;
        }
        .welcome-icon {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }
        .email-footer {
            background-color: #f1f4f8;
            padding: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #7f8c8d;
        }
        .cta-button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .cta-button:hover {
            background-color: #2980b9;
        }
        .details-section {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #3498db;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <svg class="welcome-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="white">
                <path d="M32 6C17.641 6 6 17.641 6 32s11.641 26 26 26 26-11.641 26-26S46.359 6 32 6zm14.445 35.479c-1.759 1.76-4.616 1.76-6.375 0L32 33.75l-8.07 8.729c-1.759 1.76-4.616 1.76-6.375 0-1.759-1.76-1.759-4.61 0-6.37L25.625 27.4c1.759-1.76 4.616-1.76 6.375 0L46.445 35.11c1.759 1.76 1.759 4.61 0 6.369z"/>
            </svg>
            <h1>Kenya Safety Tech Medical Training 🩺</h1>
        </div>

        <div class="email-body">
            <h2>Dear {{ $student->first_name }} {{ $student->last_name }}, 🎉</h2>

            <p>Congratulations! We are thrilled to inform you that your registration for our medical training program has been approved. 🏥</p>

            <div class="details-section">
                <strong>What's Next:</strong>
                <ul>
                    <li>Orientation Session: Coming Soon 📅</li>
                    <li>Welcome Package: Will be sent shortly 📦</li>
                    <li>First Day of Training: Mark your calendar! 🗓️</li>
                </ul>
            </div>

            <p>We are excited to welcome you to our health and safety training community. Your journey to becoming a skilled professional starts here!</p>

            <a href="https://bnserp.com/login" class="cta-button">Access Student Portal</a>
        </div>

        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Kenya Safety Tech. Empowering Healthcare Professionals. 💡</p>
            <p>Contact: support@kenyasafetytech.com | +254 XXXXXXXX</p>
        </div>
    </div>
</body>
</html>
