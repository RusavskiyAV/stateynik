import axios from 'axios';

document.addEventListener("DOMContentLoaded", (event) => {
    statistic();
    comment();
});

function statistic() {
    let like = document.querySelector('#likes'),
        views = document.querySelector('#views'),
        article_id = like.dataset.article;

    like.addEventListener('click', () => {
        axios
            .post('/api/like', {article_id: article_id})
            .then(response => {
                like
                    .querySelector('span')
                    .innerText = response.data;
                like.disabled = true;
            })
            .catch(error => console.log(error));
    });

    setTimeout(() => {
        axios
            .post('/api/view', {article_id: article_id})
            .then(response => {
                views.innerText = response.data;
            })
            .catch(error => console.log(error));
    }, 5000);
}

function comment() {
    let form = document.querySelector('form'),
        successMessage = document.querySelector('#successmessage');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let formData = new FormData(e.target);

        axios
            .post(
                '/api/comment',
                {
                    article_id: document.querySelector('#likes').dataset.article,
                    subject: formData.get('subject'),
                    body: formData.get('body')
                })
            .then(() => {
                form.style.display = "none";
                successMessage.style.display = "inline";
            })
            .catch(error => console.log(error));
    });
}
