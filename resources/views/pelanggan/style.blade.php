<style>
    body {
        background: linear-gradient(135deg, #ffffffff 0%, #5e5e5eff 100%);
        animation: moveGradient 6s ease infinite;
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #fff;
        transition: all 0.3s ease-in-out;
    }

    .card-header {
        background: linear-gradient(270deg, #00c6ff, #007bff);
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
    }

    @keyframes moveGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

</style>

