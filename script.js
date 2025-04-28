document.addEventListener("DOMContentLoaded", function () {
    const signUpButton = document.getElementById("signUpButton");
    const signInButton = document.getElementById("signInButton");
    const signInForm = document.getElementById("signIn");
    const signUpForm = document.getElementById("signup");

    // تبديل بين صفحات التسجيل وتسجيل الدخول
    signUpButton.addEventListener("click", function () {
        signInForm.style.display = "none";  // إخفاء نموذج تسجيل الدخول
        signUpForm.style.display = "block";  // عرض نموذج التسجيل
    });

    signInButton.addEventListener("click", function () {
        signInForm.style.display = "block";  // عرض نموذج تسجيل الدخول
        signUpForm.style.display = "none";  // إخفاء نموذج التسجيل
    });

    // بشكل افتراضي يتم عرض نموذج تسجيل الدخول عند تحميل الصفحة
    signInForm.style.display = "block"; 
    signUpForm.style.display = "none";  

  


    sendCodeBtn.addEventListener("click", function () {
        let emailInput = signUpForm.querySelector("#email");
        let email = emailInput.value.trim();

        if (!email) {
            showError("Veuillez entrer un e-mail valide.", emailInput);
            return;
        }

        sendCodeBtn.disabled = true; // تعطيل الزر أثناء الإرسال
        sendCodeBtn.innerText = "Envoi en cours...";

        fetch("register.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({ sendCode: 1, email: email }),
        })
            .then(response => response.text())
            .then(data => {
                alert(data);
                codeGroup.style.display = "block"; // إظهار حقل إدخال كود التحقق
            })
            .catch(error => {
                showError("Erreur lors de l'envoi du code.", emailInput);
                console.error("Erreur :", error);
            })
            .finally(() => {
                sendCodeBtn.disabled = false; // إعادة تفعيل الزر
                sendCodeBtn.innerText = "Envoyer le Code";
            });
    });
    signUpForm.addEventListener("submit", function (event) {
        event.preventDefault(); // منع إرسال النموذج بشكل تقليدي
        // يمكن إضافة الكود هنا للتحقق أو إرسال البيانات عبر AJAX إذا لزم الأمر
    });    

    // دالة لإظهار الأخطاء
    function showError(message, inputElement) {
        // إزالة الرسائل السابقة إذا كانت موجودة
        if (inputElement.parentNode.contains(errorMessage)) {
            inputElement.parentNode.removeChild(errorMessage);
        }
        
        errorMessage.innerText = message;
        inputElement.parentNode.appendChild(errorMessage);
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll(".input-group input");

    inputs.forEach(input => {
      // أول مرة – إذا الحقل فيه قيمة مسبقًا
      if (input.value.trim() !== "") {
        input.classList.add("filled");
      }

      // عند كل إدخال أو حذف
      input.addEventListener("input", () => {
        if (input.value.trim() !== "") {
          input.classList.add("filled");
        } else {
          input.classList.remove("filled");
        }
      });
    });
  });


