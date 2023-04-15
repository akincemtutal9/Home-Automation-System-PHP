const checkDeviceButtons = document.querySelectorAll('.check-device-button');
const newViews = document.querySelectorAll('.new-view');
const undoButtons = document.querySelectorAll('.undo-button');

// Add click event listeners to all check device buttons
checkDeviceButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    button.style.display = 'none';
    newViews[index].style.display = 'block';
  });
});

// Add click event listeners to all undo buttons
undoButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    newViews[index].style.display = 'none';
    checkDeviceButtons[index].style.display = 'block';
  });
});