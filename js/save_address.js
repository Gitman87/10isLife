function saveCurrentAddress(addressKey) {
  let localStorageManager = new LocalStorageManager();
  const currentAddress = window.location.href;
  console.log("Current address to be written is: ", currentAddress);
  localStorageManager.update(addressKey, currentAddress);
}
