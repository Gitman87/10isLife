function saveCurrentAddress(addressKey) {
  let localStorageManager = new LocalStorageManager();
  const currentAddress = window.location.href;
  localStorageManager.update(addressKey, currentAddress);
}
