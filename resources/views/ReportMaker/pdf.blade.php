
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="utf-8">
    <title></title>
    <style>
      html{
width: 100%;
height: 100%;
padding: 0;
margin: 0;
}
  #id-card-field{
    width:8.3in;
    height:11in;
    position:relative;
    background:#fff;
  }
  #id-card-field .field-item{
    position:absolute;
    margin: 3px 5px;
  }
  #id-card-field .field-item.focus::before{
    content:"0";
    position:relative;
    width:100%;
    height:100%;
    border: 1px pink;
  }
  #id-card-field .field-item[data-type="textfield"]{
    padding:3px 5px;
  }
  #id-card-field .field-item.img{
    width:50px;
    height:50px;
  }
  #id-card-field .field-item>img{
    width:100%;
    height:100%;
    object-fit:fill;
    object-position:center center;
  }
  .remove_field{
    cursor:pointer;
  }
  #upload-button {
    width: 150px;
    display: block;
    margin: 20px auto;
  }

  #file-to-upload {
    display: none;
  }

  #pdf-main-container {
    width: 400px;
    margin: 20px auto;
  }

  #pdf-contents {
    display: none;
  }

  #pdf-meta {
    overflow: hidden;
    margin: 0 0 20px 0;
  }

  #pdf-canvas {
    border: 1px solid rgba(0,0,0,0.2);
    box-sizing: border-box;
  }

  #page-loader {
    height: 100px;
    line-height: 100px;
    text-align: center;
    display: none;
    color: #999999;
    font-size: 13px;
  }
  .center-div {
  display: grid;
  place-items: center;
}
#id-card-field .field-item-table{
          position:absolute;
          margin: 3px 5px;
        }
        #id-card-field .field-item-table.focus::before{
          content:"0";
          position:relative;
          width:100%;
          height:100%;
          border: 1px pink;
        }
        #id-card-field .field-item-table[data-type="textfield"]{
          padding:3px 5px;
        }
        #id-card-field .field-item-table.img{
          width:50px;
          height:50px;
        }
        #id-card-field .field-item-table>img{
          width:100%;
          height:100%;
          object-fit:fill;
          object-position:center center;
        }
        .child {
        background: red;
        width: 150px;
        height: 80px;
        position: absolute;
        background-size: cover;
    }

    

    .ui-resizable-se {
        background-image: none !important;
        right: -5px !important;
        bottom: -5px !important;
    }

    .ui-resizable-n,
    .ui-resizable-s {
        left: 50% !important;
        margin-left: -6px !important;
    }

    .ui-resizable-e,
    .ui-resizable-w {
        top: 50% !important;
        margin-top: -6px !important;
    }
</style>
  </head>
  <body>
  <div class="center-div">
    <?php print_r($htmlcode);?>
</div>
</body>
</html>