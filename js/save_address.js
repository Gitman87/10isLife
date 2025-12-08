function saveCurrentAddress(addressKey) {
  let localStorageManagerAddress = new LocalStorageManager();
  const currentAddress = window.location.href;
  console.log("Current address to be written is: ", currentAddress);
  localStorageManagerAddress.write(addressKey, currentAddress);
}
