function collapseChain(element, chainContainerClass) {
  console.log("collapse chain start");
  const chainContainer = document.querySelector(`.${chainContainerClass}`);
  const chain = chainContainer.children;
  console.log("chain length is ", chain);
  //collapse all elements
  const keysChain = Object.keys(chain);
  //collapse everything
  keysChain.forEach((key) => {
    const link = chain[key];
    link.style.visibility = "collapse";
  });
  //mak visibile hit object
  if (element.parentElement.nextElementSibling) {
    let nextLink = element.parentElement.nextElementSibling;
    //reveal next element
    nextLink.style.visibility = "visible";
  } else {
    console.log("End of chain");
  }
}
