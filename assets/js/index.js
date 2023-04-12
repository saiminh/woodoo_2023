function detectLinkToCurrentURL() {
  const currentURL = window.location.href;
  const links = document.querySelectorAll('a');
  links.forEach((link) => {
    console.log(currentURL, link.href);
    if (link.href === currentURL) {
      link.classList.add('currentLink');
    }
  });
}
document.addEventListener('DOMContentLoaded', detectLinkToCurrentURL);
