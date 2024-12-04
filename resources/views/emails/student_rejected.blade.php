<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status - Kenya Safety Tech</title>
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
            background: linear-gradient(135deg, #7252cc 0%, #9205f0 100%);
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
        .rejection-icon {
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
        .support-button {
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
        .support-button:hover {
            background-color: #2980b9;
        }
        .details-section {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #e74c3c;
        }
        .next-steps {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <svg class="rejection-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="white">
                <path d="M32 6C17.641 6 6 17.641 6 32s11.641 26 26 26 26-11.641 26-26S46.359 6 32 6zm10.293 33.707a1 1 0 0 1-1.414 1.414L32 33.414l-8.879 8.879a1 1 0 0 1-1.414-1.414L30.586 32l-8.879-8.879a1 1 0 0 1 1.414-1.414L32 30.586l8.879-8.879a1 1 0 0 1 1.414 1.414L33.414 32l8.879 8.879z"/>
            </svg>
            <h1>Registration Application Update 📋</h1>
        </div>

        <div class="email-body">
            <h2>Dear {{ $student->first_name }} {{ $student->last_name }}, 🚨</h2>

            <p>We regret to inform you that your registration application for the Kenya Safety Tech Medical Training Program has not been successful at this time. 😔</p>

            <div class="details-section">
                <strong>Important Information:</strong>
                <p>While your current application was not approved, this does not diminish your potential or capabilities. We encourage you to:</p>
                <ul>
                    <li>Review the application requirements 📝</li>
                    <li>Seek guidance from our admissions team 🤝</li>
                    <li>Consider reapplying in the next intake 🔄</li>
                </ul>
            </div>

            <div class="next-steps">
                <a href="mailto:admissions@kenyasafetytech.com" class="support-button">Contact Admissions</a>
            </div>
        </div>

        <div class="email-footer">
            <p>We appreciate your interest in Kenya Safety Tech 🏥</p>
            <p>&copy; {{ date('Y') }} Kenya Safety Tech. Nurturing Healthcare Professionals. 💡</p>
            <p>Support: +2542456387 | admissions@kenyasafetytech.com</p>
        </div>
    </div>
</body>
</html>
