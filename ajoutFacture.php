<html lang="en">
  <?php include ('gestion/header_sidebar.php'); ?>
  <head>
      <style>
          body {
              display: flex;
              flex-direction: column;
              align-items: center;
              justify-content: space-between;
              background: linear-gradient(to right, #05DD9A, #7DFFD6);
              font-family: 'Ruda', sans-serif;

            }
            
            h3 {
                margin-bottom: 50px;
                color: #05DD9A;
            }
            
            
            
            .file-drop-area {
                position: relative;
                display: flex;
                align-items: center;
                width: 570px;
                max-width: 50%;
                padding: 40px;
                border: 1px dashed rgba(0, 0, 0, 0.4);
                border-radius:8px;
                transition: 0.2s;
                margin-bottom: 30px;
                margin-left: 15px;
                margin-right: 20px;
                
            }
            .choose-file-button {
                flex-shrink: 0;
                background-color: rgba(125, 255, 214, 0.3);
                border: 1px solid rgba(5, 221, 154, 0.2);
                border-radius: 3px;
                padding: 8px 15px;
                margin-right: 20px;
                font-size: 12px;
                text-transform: uppercase;
            }
        
            
            .file-message {
                font-size: small;
                font-weight: 300;
                line-height: 1.4;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .file-input {
                position: absolute;
                left: 0;
                top: 0;
                height: 100%;
                width: 100%;
                cursor: pointer;
                opacity: 0;
                
            }
            
            .mt-100{
                margin-top:10px;
            }
            .btn-success {
                margin-bottom: 20px;
                color: #fff;
                background-color: #05DD9A;
                border-color: #05DD9A;
            }
            .btn-success:hover {
                color: #fff;
                background-color: #7DFFD6;
                border-color: #7DFFD6;
            }
           
            </style>
</head>

<body>
  <section id="container">
      <?php include ('gestion/menu.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">  
                          <div class="container d-flex justify-content-center mt-100">
                              <div class="row">
                                    <h3><i class="fa fa-angle-right"></i> Ajouter Facture</h3>
                                    <p id="message"></p>
                                    <div class="file-drop-area">
                                        <span class="choose-file-button">CHOISIR UN FICHIER</span>
                                        <span class="file-message">or drag and drop files here</span>
                                        <input class="file-input" type="file" id="doc_facture">
                                    </div>
                                    
                                    <div class="container d-flex justify-content-center mt-100">
                                        <label style=" color: #D8000C;text-align: center;" class="error" for="doc_facture" id="doc_facture_error"> </label>
                                    </div>                                 
                                </div>                                        
                                    

                                <button type="submit" id="btn_ajout_facture" class="btn btn-success ">Ajouter un Projet</button>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <?php include ('gestion/footer.php');?>
    </section>
    
    <script>
        $(document).on('change', '.file-input', function() {
            var filesCount = $(this)[0].files.length;
            var textbox = $(this).prev();
            
            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
                textbox.text(fileName);
            } 
        });
    </script>
</body>
</html>

    
    
    