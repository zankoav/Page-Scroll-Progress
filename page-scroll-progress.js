(function () {
    window.addEventListener("load", function () {

        const wrapperEl = document.createElement('div');
        wrapperEl.setAttribute('id', 'page-scroll-progress');
        const lineEl = document.createElement('div');
        lineEl.setAttribute('class', 'page-scroll-progress__line');
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

            lineEl.style.width = `${percent}%`;
        }
    });
})();