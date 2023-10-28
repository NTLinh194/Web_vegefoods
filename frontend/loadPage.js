$("#product--js").click(function (e) {
    e.preventDefault();
    $("#infoProduct--js").load("info-productModel.php");
})