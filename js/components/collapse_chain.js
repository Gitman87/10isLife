function collapseChain(element, chainContainerClass) {
  console.log("collapse chain start");
  const chainContainer = document.querySelector(`.${chainContainerClass}`);
  const chain = chainContainer.children;

  //collapse all elements
  chain.forEach((link) => {
    link.style.visibility = "collapse";
  });

  if (element.parentElement.nextElementSibling) {
    let nextLink = element.parentElement.nextElementSibling;
    //reveal next element
    nextLink.style.visibility = "visible";
  } else {
    console.log("End of chain");
  }
}
