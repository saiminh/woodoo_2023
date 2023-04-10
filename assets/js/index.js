function initHeader() {
  const header = document.querySelector('header.wp-block-template-part');
  let headerHeight = header.offsetHeight;

  window.addEventListener('resize', () => {
    headerHeight = header.offsetHeight;
  })

  function setHeaderClass(){
    const darkContainers = document.querySelectorAll('.has-contrast-background-color');
    if (darkContainers) {
      darkContainers.forEach((darkContainer, index) => {
        const darkContainerRect = darkContainer.getBoundingClientRect();
        if (darkContainerRect.top < headerHeight/2 && darkContainerRect.bottom >= headerHeight/2) {
          header.classList.add('header--inverted--' + index);
        } else {
          header.classList.remove('header--inverted--' + index);
        }
      })
    }
  }
  setHeaderClass();

  window.addEventListener('scroll', () => {
    setHeaderClass();
  })
}
document.addEventListener('DOMContentLoaded', function() {
  initHeader();
  console.log('initHeader');
})