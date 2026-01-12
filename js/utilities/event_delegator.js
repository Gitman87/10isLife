const addParentListenerNearest = (
  type,
  selector,
  parent = document,
  callback
) => {
  parent.addEventListener(type, (e) => {
    let nearestTarget = e.target;
    if (nearestTarget.matches(selector)) {
      nearestTarget = nearestTarget;
    } else {
      nearestTarget = e.target.closest(selector);
    }
    if (nearestTarget) {
      callback(e, nearestTarget);
    }
  });
}; // thanks, WDS
