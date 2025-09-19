const face = document.querySelector('.face');
const blushLeft = document.querySelector('.blush-left');
const blushRight = document.querySelector('.blush-right');
const heart = document.querySelector('.heart');
const text = document.querySelector('.status-text');
const crush = document.querySelector('.crush');

crush.addEventListener('animationiteration', () => {
    // SALTING MOMENT
    face.textContent = '😳';
    text.textContent = 'Eh dia lewat... 😳';
    face.style.transform = 'scale(1.1)';
    blushLeft.style.opacity = 1;
    blushRight.style.opacity = 1;
    heart.style.opacity = 1;
    heart.style.transform = 'translateX(-50%) scale(1)';

    setTimeout(() => {
        // KEMBALI NORMAL
        face.textContent = '😐';
        text.textContent = 'Fokus ngoding...';
        face.style.transform = 'scale(1)';
        blushLeft.style.opacity = 0;
        blushRight.style.opacity = 0;
        heart.style.opacity = 0;
        heart.style.transform = 'translateX(-50%) scale(0.3)';
    }, 3000);
});
