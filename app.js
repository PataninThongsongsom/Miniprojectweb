document.addEventListener("DOMContentLoaded", function() {
    let Parallax1 = document.getElementById('Parallax1');
    let Parallax2 = document.getElementById('Parallax2');
    let Info = document.getElementById('Info');

    window.addEventListener('scroll', function() {
        let value = window.scrollY;
        // Parallax1.style.top = value * 0.55 + 'px';
        // Parallax2.style.top = value * -1.25 + 'px';
        // // Info.style.top = value * -1.25 + 'px';
        // let blurIntensity = Math.min(10, value * 0.025);
        // Parallax1.style.filter = `blur(${blurIntensity}px)`;
        
        
    });
});