   

    window.onload = function lightbox(idx) {
        //Show the slider wrapper
        var ninjaSldr = document.getElementById("ninja-slider");
        ninjaSldr.parentNode.style.display = "block";

        //Then init the slider
        //Note: The { initSliderByCallingInitFunc: true } option in the 
        // ninja-slider.js tells the page not to initiate the slider
        // unless the following init(idx) function is called.
        nslider.init(idx);

        //Then mimic clicking the fullscreen button to popup the modal
        var fsBtn = document.getElementById("fsBtn");
        fsBtn.click();
    }

    function fsIconClick(isFullscreen) {
        //Note: fsIconClick is the default event handler of the fullscreen button
        var ninjaSldr = document.getElementById("ninja-slider");
        ninjaSldr.parentNode.style.display = isFullscreen ? "block" : "none";
    }