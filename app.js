let preview_image = document?.querySelector(".preview-image");
let image_input = document?.querySelector(".image-input");
let flash = document?.querySelector(".flash-message");
preview_image?.style?.display = "none";

image_input.addEventListener("input", (e) => {
  const file = e?.target?.files[0];
  const image_url = URL?.createObjectURL(file);
  preview_image?.src = image_url;
  preview_image?.style?.display = "block";
});


