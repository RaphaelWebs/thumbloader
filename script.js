//Get thumbnail
document.addEventListener(
  "DOMContentLoaded",
  function () {
    //Selectors
    const urlField = document.querySelector(".field input"),
      previewArea = document.querySelector(".preview-area"),
      imgTag = previewArea.querySelector(".thumbnail"),
      hiddenInput = document.querySelector(".hidden-input"),
      button = document.querySelector(".download-btn");
    //Display Thumbnail on preview
    urlField.onkeyup = () => {
      let imgUrl = urlField.value;
      previewArea.classList.add("active");
      button.style.pointerEvents = "auto";

      //Turn Youtube long url into thumbnail url
      if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
        let vidId = imgUrl.split("v=")[1].substring(0, 11);
        let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytImgUrl; //Sets thumbnail url as source
      }

      //Turn Youtube short url into thumbnail url
      else if (imgUrl.indexOf("https://youtu.be/") != -1) {
        let vidId = imgUrl.split("be/")[1].substring(0, 11);
        let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytImgUrl; //Sets thumbnail url as source

        //Accepts any image to download
      } else if (imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)) {
        imgTag.src = imgUrl; //Sets thumbnail url as source
      }
      //Returns thumbnail box to original state
      else {
        imgTag.src = "";
        button.style.pointerEvents = "none";
        previewArea.classList.remove("active");
      }
      hiddenInput.value = imgTag.src; //Puts the image url as a value for a hidden input
    };
  },
  false
);
