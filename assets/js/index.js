function detectLinkToCurrentURL() {
  const currentURL = window.location.href;
  const links = document.querySelectorAll('a');
  links.forEach((link) => {
    if (link.href === currentURL) {
      link.classList.add('currentLink');
    }
  });
}

function jobApplicationDecodeURL(){
  //check URL for 'service' parameter and decode it from base64
  var url = new URL(window.location.href);
  var service = url.searchParams.get("service");
  if(service){
    var decodedService = atob(service);
    // find an input field with name="service" and set its value to the decoded value
    var serviceInput = document.querySelector('input[name="service"]');
    serviceInput.setAttribute('value', decodedService);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  detectLinkToCurrentURL();
  jobApplicationDecodeURL();
});
