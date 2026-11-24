const navigationToggle = document.querySelector('.nav-toggle');
const navigation = document.querySelector('#primary-navigation');

navigationToggle?.addEventListener('click', () => {
    const isExpanded = navigationToggle.getAttribute('aria-expanded') === 'true';

    navigationToggle.setAttribute('aria-expanded', String(!isExpanded));
    navigation?.classList.toggle('is-open', !isExpanded);
});
