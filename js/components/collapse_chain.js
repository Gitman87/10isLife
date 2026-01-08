function collapseChain(element, chainContainerClass) {
  const chainContainer = document.querySelector(`.${chainContainerClass}`);
  const chain = chainContainer.children;
  //collapse all elements
  const keysChain = Object.keys(chain);
  //collapse everything
  keysChain.forEach((key) => {
    const link = chain[key];
    link.style.visibility = "collapse";
    // link.style.marginTop = " -.5rem";
  });
  //mak visibile hit object
  if (element.parentElement.nextElementSibling) {
    let nextLink = element.parentElement.nextElementSibling;
    //reveal next element
    nextLink.style.visibility = "visible";
  } else {
    console.log("End of chain");
  }
  return true;
}
