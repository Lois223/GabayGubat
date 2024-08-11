document.addEventListener('DOMContentLoaded', () => {
    //function to generate a random CAPTCHA code
    function generateCaptcha() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let captcha = '';
        for (let i = 0; i < 6; i++) {
            captcha += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return captcha;
    }
    //function to display the CAPTCHA
    function displayCaptcha() {
        captchaText = generateCaptcha();
        document.getElementById('captcha').textContent = captchaText;
    }

    //generate and display the initial CAPTCHA
    let captchaText = '';
    displayCaptcha();

    //refresh CAPTCHA on click
    document.getElementById('refreshCaptcha').addEventListener('click', displayCaptcha);

    //handle form submission
    document.getElementById('login-form').addEventListener('submit', (e) => {
        e.preventDefault();
        const userCaptchaInput = document.getElementById('captchaInput').value;

        //validate CAPTCHA
        if (userCaptchaInput === captchaText) {
            alert('Login successfully!');
            window.location.assign("index.html");
        } else {
            alert('Incorrect CAPTCHA. Please try again.');
            //regenerate the CAPTCHA
            displayCaptcha();
        }
    });
});