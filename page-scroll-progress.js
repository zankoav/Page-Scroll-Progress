(function () {
    window.addEventListener("load", function () {
        //@variables
        const wrapperEl = document.createElement('div');
        wrapperEl.setAttribute('id', 'page-scroll-progress');
        wrapperEl.setAttribute('class', `page-scroll-progress_${position}`);
        wrapperEl.style.backgroundColor = substratesColor;
        const lineEl = document.createElement('div');
        lineEl.setAttribute('class', 'page-scroll-progress__line');
        lineEl.style.backgroundColor = lineColor;
        wrapperEl.appendChild(lineEl);
        document.body.appendChild(wrapperEl);

        window.addEventListener('scroll', update);
        window.addEventListener('resize', update);

        function update() {
            let body = document.body,
                html = document.documentElement;

            let height = Math.max(body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight);

            let heightWindow = window.innerHeight || document.documentElement.clientHeight ||
                document.body.clientHeight;

            let percent = 100 * window.scrollY / (height - heightWindow);

            if (position === 'top' || position === 'bottom') {
                lineEl.style.width = `${percent}%`;
            } else {
                lineEl.style.height = `${percent}%`;
            }
        }
    });
})();