const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');

let index = 1; // نبدأ من الشريحة الثانية بسبب التكرار الوهمي
const intervalTime = 4000;
let slideInterval;

// **نسخ أول وآخر شريحة لإنشاء التأثير الحلقي**
const firstClone = slides[0].cloneNode(true);
const lastClone = slides[slides.length - 1].cloneNode(true);

firstClone.id = 'first-clone';
lastClone.id = 'last-clone';

// **إضافة النسخ إلى السلايدر**
slider.appendChild(firstClone);
slider.insertBefore(lastClone, slides[0]);

const allSlides = document.querySelectorAll('.slide'); // تحديث القائمة بعد النسخ
const totalSlides = allSlides.length; // عدد الشرائح بعد الإضافة

// **ضبط الترجمة الأولية للانتقال بسلاسة**
slider.style.transform = `translateX(-${index * 100}%)`;

// **دالة إظهار الشريحة مع التأثير الحلقي**
function showSlide(newIndex) {
    if (newIndex >= totalSlides) {
        index = 1; // العودة إلى الشريحة الأولى الفعلية
        slider.style.transition = "none";
        slider.style.transform = `translateX(-${index * 100}%)`;
        return;
    }

    if (newIndex <= 0) {
        index = totalSlides - 2; // العودة إلى الشريحة الأخيرة الفعلية
        slider.style.transition = "none";
        slider.style.transform = `translateX(-${index * 100}%)`;
        return;
    }

    index = newIndex;
    slider.style.transition = "transform 0.5s ease-in-out";
    slider.style.transform = `translateX(-${index * 100}%)`;
}

// **التحكم اليدوي بالأزرار**
nextBtn.addEventListener('click', () => {
    showSlide(index + 1);
    resetInterval();
});

prevBtn.addEventListener('click', () => {
    showSlide(index - 1);
    resetInterval();
});

// **التشغيل التلقائي**
function startSlide() {
    slideInterval = setInterval(() => showSlide(index + 1), intervalTime);
}
startSlide();

// **إعادة تشغيل المؤقت عند التفاعل اليدوي**
function resetInterval() {
    clearInterval(slideInterval);
    startSlide();
}

// **تصحيح موضع الشريحة بعد الانتقال الوهمي**
slider.addEventListener('transitionend', () => {
    if (allSlides[index].id === "first-clone") {
        index = 1;
        slider.style.transition = "none";
        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    if (allSlides[index].id === "last-clone") {
        index = totalSlides - 2;
        slider.style.transition = "none";
        slider.style.transform = `translateX(-${index * 100}%)`;
    }
});
