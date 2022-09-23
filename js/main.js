$(document).ready(function () {
  insertUser();
  updateUser();
  ajoutProjet();
  affiche_projet();
  archive_projet();
  archive_Client();
  ajout_Client();
  affiche_client();
  delete_Projet();
  get_etat_data();
  update_etat_employe();
  get_data_projet();
  update_projet_responsable();
  get_data_client();
  update_client();
  delete_client();
  liste_employes();
  delete_employe();
  get_domainepersonne_data();
  affectation_projet();
  ajoutConge();
  affiche_Liste_conge();
  get_etat_conge();
  update_etat_conge();
  affiche_Liste_conge_refuse();
  affiche_liste_facture();
  ajout_facture();
  delete_facture();
  ajout_fiche_paie();
  affiche_liste_fiche_paie();
  delete_fiche_paie();
  get_data_fichePaie();
  update_fichePaie();
  get_data_employe();
  update_employe();
  get_fiche_paie();
});


function insertUser() {
  $(document).on("click", "#btn_ajout_user", function () {

    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var numCIN = $("#numCIN").val();
    var numTel = $("#numTel").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirmPassword").val();
    var poste = $("#poste").val();


    let checkBox = document.querySelectorAll("input[type=checkbox]");

    const radioButtons = document.querySelectorAll('input[name="user"]');
    let role;
    for (const radioButton of radioButtons) {
      if (radioButton.checked) {
        role = radioButton.value;
        break;
      }
    }

    if (nom == "" && prenom == "" && email == "" && numCIN == "" && numTel == "" && password == "" && confirmPassword == "") {
      alert("Les champs sont vides")
    } else if (nom == "") {
      alert("Créer votre Nom s'il vous plait")

    } else if (prenom == "") {
      alert("Créer votre Prénom s'il vous plait")

    } else if (email == "") {
      alert("Créer votre email s'il vous plait")

    } else if (numTel == "") {
      alert("Créer votre Numéro Téléphone s'il vous plait")

    } else if (password == "") {
      alert("Créer votre mot de passe s'il vous plait")

    } else if (confirmPassword == "") {
      alert("Confirmer votre  Mot de Passe s'il vous plait")
    } else if (password != confirmPassword) {
      alert("Le mot de passe n'est pas valide ")

    } else {
      checkBox.forEach((v) => {
        if (v.checked) {

          $.ajax({
            url: "ajoutUser.php",
            method: "post",
            data: {
              nom: nom,
              prenom: prenom,
              numTel: numTel,
              numCIN: numCIN,
              email: email,
              password: password,
              confirmPassword: confirmPassword,
              role: role,
              poste:poste,

            },
            success: function (data) {
              $("#message").addClass("alert alert-success").html(data);
             
              setTimeout(function () {
                if ($("#message").length > 0) {
                  $("#message").remove();
                }
              }, 2500);
            },
          });

        }

      });


    }
  });
}

function ajoutProjet() {
  $(document).on("click", "#btn_ajout_projet", function () {

    var titre_projet = $("#titre_projet").val();
    var description = $("#description").val();
    var domaine = $("#domaine").val();
    var priorite = $("#perioritee").val();
    var nomClient = $("#nomClient").val();
    var doc_projet = $("#doc_projet").prop("files")[0];
    
    if (nomClient == null) {
      $("#nomClient_error").html("Choisir le client s'il vous plait.");
      $("#nomClient_error").show();
      $("#nomClient").focus();
      return false;


    } else if (domaine == null) {
      $("#domaine_error").html("Choisir le domaine de projet.");
      $("#domaine_error").show();
      $("#domaine").focus();
      return false;

    } else if (priorite == null) {
      $("#periorite_error").html("Ecrire la priorité s'il vous plait.");
      $("#periorite_error").show();
      $("#perioritee").focus();
      return false;

    } else if (titre_projet == "") {
      $("#titre_projet_error").html("Ecrire le titre de projet s'il vous plait.");
      $("#titre_projet_error").show();
      $("#titre_projet").focus();
      return false;
    } else if (doc_projet == undefined) {
      $("#doc_projet_error").html("choisir un fichier s'il vous plait.");
      $("#doc_projet_error").show();
      $("#doc_projet").focus();
      return false;
    } else {
      var form_data = new FormData();
      form_data.append("domaine", domaine);
      form_data.append("nomClient", nomClient);
      form_data.append("titre_projet", titre_projet);
      form_data.append("priorite", priorite);
      form_data.append("description", description);
      form_data.append("doc_projet", doc_projet);
      $.ajax({
        url: "ajoutProjet.php",
        method: "post",
        processData: false,
        contentType: false,
        data: form_data,
      });
    }
  });
}

function ajout_facture() {
  $(document).on("click", "#btn_ajout_facture", function () {

    var doc_facture = $("#doc_facture").prop("files")[0];
    if (doc_facture == undefined) {
      $("#doc_facture_error").html("Choisir un fichier s'il vous plait.");
      $("#doc_facture_error").show();
      $("#doc_facture").focus();
      return false;
    } else {
      
      var form_data = new FormData();
      form_data.append("doc_facture", doc_facture);
      $.ajax({
        url: "ajout_facture.php",
        method: "post",
        processData: false,
        contentType: false,
        data: form_data,
        success: function (data) {
          $("#message").addClass("alert alert-success").html(data);
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 2500);
        },
      });
    }
  });
}


function ajout_Client() {

  $(document).on("click", "#btn_ajout_client", function () {
    var nom_entreprise = $("#nom_entreprise").val();
    var email = $("#email_client").val();
    var numTel = $("#numTel_client").val();
    var adresse = $("#adresse_client").val();
    var commentaire = $("#commentaire_client").val();

    if (nom_entreprise == "") {
      $("#nom_entreprise_error").html("Ecrire le nom de l'entreprise.");
      $("#nom_entreprise_error").show();
      $("#nom_entreprise").focus();
      return false;


    } else if (email == "") {
      $("#email_client_error").html("Ecrire l'adresse email de télephone.");
      $("#email_client_error").show();
      $("#email_client").focus();
      return false;

    } else if (numTel == "") {
      $("#numTel_client_error").html("Ecrire le numéro de télephone.");
      $("#numTel_client_error").show();
      $("#numTel_client").focus();
      return false;

    } else if (adresse == "") {
      $("#adresse_client_error").html("Ecrire l'adresse de projet.");
      $("#adresse_client_error").show();
      $("#adresse_client").focus();
      return false;

    } else {
    $.ajax({
      url: "ajout_Client.php",
      method: "post",
      data: {
        nom_entreprise: nom_entreprise,
        email: email,
        numTel: numTel,
        adresse: adresse,
        commentaire: commentaire,
      },
      
      success: function (data) {
        $("#message_client").addClass("alert alert-success").html(data);
        setTimeout(function () {
          if ($("#message_client").length > 0) {
            $("#message_client").remove();
          }
        }, 2500);
      },
    });
  }
  });
}





function ajout_fiche_paie() {

  $(document).on("click", "#ajout_fiche-paie", function () {
    var list_employe = $("#list_employe").val();
    var prime = $("#prime").val();
    var Conge_mois = $("#Conge_mois").val();
    var mois = $("#mois").val();
    var annee = $("#annee").val();

    if (list_employe == null && prime =="" && Conge_mois == null && mois == null && annee =="" ) {
      alert("Remplir le Formulaire!")
    } else {
    $.ajax({
      url: "ajout_fichePaie.php",
      method: "post",
      data: {
        list_employe: list_employe,
        prime: prime,
        Conge_mois: Conge_mois,
        mois: mois,
        annee: annee,
      },
      
      success: function (data) {
        $("#message").addClass("alert alert-success").html(data);
        setTimeout(function () {
          if ($("#message").length > 0) {
            $("#message").remove();
          }
        }, 2500);
      },
    });
  }
  });
}





function updateUser() {
  $(document).on("click", "#btn-update", function () {

    var id = $("#id").val();
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var numTel = $("#numTel").val();
    var numCIN = $("#numCIN").val();
    var password = $("#password").val();
    var poste = $("#poste").val();
    if (numCIN == undefined) {
      numCIN = 0;
    }
    if (poste == null) {
      poste = 0;
    }
    var user = $("#user").prop("files")[0];
    if (user == undefined) {
      user = "";
    }
      var form_data = new FormData();
      form_data.append("id", id);
      form_data.append("nom", nom);
      form_data.append("prenom", prenom);
      form_data.append("numTel", numTel);
      form_data.append("numCIN", numCIN);
      form_data.append("password", password);
      form_data.append("poste", poste);
      form_data.append("user", user);
    $.ajax({
      url: "updateUser.php",
      method: "post",
        processData: false,
        contentType: false,
        data: form_data,
      success: function (data) {
        $("#message").addClass("alert alert-success").html(data);
        setTimeout(function () {
          if ($("#message").length > 0) {
            $("#message").remove();
          }message
        }, 2500);
      },

    });
    
  });
}


function affiche_projet() {
  $.ajax({
    url: "affiche_projet.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#projet-list").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}



function affiche_liste_facture() {
  $.ajax({
    url: "affiche_liste_facture.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#facture-list").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}


function affiche_client() {
  $.ajax({
    url: "affiche_client.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#client-list").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}



function affiche_liste_fiche_paie() {
  $.ajax({
    url: "affiche_liste_fiche_paie.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#liste_fiche_paie").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}



function archive_projet() {
  $.ajax({
    url: "affiche_projet_termines.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#liste_projet_terminer").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}



function archive_Client() {
  $.ajax({
    url: "affiche_archive_client.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#liste_client_terminer").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}



function liste_employes() {
  $.ajax({
    url: "affiche_liste_employes.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#liste_employes").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}

function delete_Projet() {
  $(document).on("click", "#btn_supprimer_responsable", function () {
    var Delete_ID = $(this).attr("data-id1");
    $("#delete_projet").modal("show");
    $(document).on("click", "#btn_delete_projet", function () {
      $.ajax({
        url: "delete_Projet.php",
        method: "post",
        data: {
          Delete_ProjetID: Delete_ID
        },
        success: function (data) {
          affiche_projet();
          $("#message_projet").addClass("alert alert-success").html(data);
          $("#delete_projet").modal("toggle");
          setTimeout(function () {
            if ($("#message_projet").length > 0) {
              $("#message_projet").remove();
            }
          }, 2500);
        },
      });
    });
    $(document).on('hide.bs.modal', '#delete_projet', function () {
      Delete_ID = "";
    });
  });
}


function delete_employe() {
  $(document).on("click", "#btn_supprimer_employe", function () {
    var Delete_ID = $(this).attr("data-id");
    $("#delete").modal("show");
    $(document).on("click", "#btn_delete", function () {
      $.ajax({
        url: "delete_employe.php",
        method: "post",
        data: {
          deleteID: Delete_ID
        },
        success: function (data) {
          liste_employes();
          $("#message").addClass("alert alert-success").html(data);
          $("#delete").modal("toggle");
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 2500);
        },
      });
    });
    $(document).on('hide.bs.modal', '#delete_projet', function () {
      Delete_ID = "";
    });
  });
}


function get_data_projet() {
  $(document).on("click", "#btn_modifier_responsable", function () {
    var updateID = $(this).attr("data-id");
    $.ajax({
      url: "get_data_projet.php",
      method: "post",
      data: {
        update_ID: updateID
      },
      dataType: "JSON",
      success: function (data) {
        $("#id_projet_responsable").val(data[0]);
        $("#update_domaine").val(data[1]);
        $("#up_titre_projet").val(data[2]);
        $("#up_priorite").val(data[3]);
        $("#up_description").val(data[4]);

        $("#update-projet_Responsable").modal("show");
        affiche_projet();
        setTimeout(function () {
          if ($("#message_projet_responsable").length > 0) {
            $("#message_projet_responsable").remove();
          }
        }, 2500);
      },
    });
  });

}


function update_projet_responsable() {
  $(document).on("click", "#btn_modifi_projet", function () {
    $("#update-projet_Responsable").scrollTop(0);
    var id_projet = $("#id_projet_responsable").val();
    var domaine = $("#update_domaine").val();
    var titre = $("#up_titre_projet").val();
    var priorite = $("#up_priorite").val();
    var description = $("#up_description").val();
    if (domaine == "" || titre == "" || priorite == "" ) {
      $("#message_projet_responsable")
        .addClass("alert alert-danger")
        .html("Veuillez remplir tous les champs obligatoires !");
      $("#update-projet_Responsable").modal("show");
    } else {
      $.ajax({
        url: "update_projet_responsable.php",
        method: "post",
        data: {
          id_projet: id_projet,
          domaine: domaine,
          titre: titre,
          priorite: priorite,
          description: description,

        },
        success: function (data) {
          affiche_projet();
          $("#message_projet").addClass("alert alert-success").html(data);
          $("#update-projet_Responsable").modal("toggle");
          setTimeout(function () {
            if ($("#message_projet").length > 0) {
              $("#message_projet").remove();
            }
          }, 2500);
        },
      });
    }
    $(document).on("click", "#btn-close", function () {
      $("#update_projet_responsable_Form").trigger("reset");
      $("#message_projet").html("");
      $("#message_projet").removeClass("alert alert-danger");
      $("#message_projet").removeClass("alert alert-sucess");
    });
  });
}



function get_etat_data() {
  $(document).on("click", "#btn_modifier_employe", function () {
    var updateID = $(this).attr("data-id2");

    $.ajax({
      url: "get_etat_data.php",
      method: "post",
      data: {
        update_ID: updateID
      },
      dataType: "JSON",
      success: function (data) {
        $("#etat").val(data[0]);
        $("#up_id_projet_Etat").val(data[1]);

        $("#update-etat_employe").modal("show");
        affiche_projet();
        setTimeout(function () {
          if ($("#message_projet").length > 0) {
            $("#message_projet").remove();
          }
        }, 2500);
      },
    });
  });
}

function update_etat_employe() {
  $(document).on("click", "#btn_modifi_etat_projet", function () {
    $("#update-etat_employe").scrollTop(0);
    var id_projet = $("#up_id_projet_Etat").val();
    var etat = $("#etat").val();
    if (etat == "") {
      $("#up_message_etat")
        .addClass("alert alert-danger")
        .html("Veuillez choisir le champs etat obligatoire !");
      $("#update-etat_employe").modal("show");
    } else {
      $.ajax({
        url: "update_etat_employe.php",
        method: "post",
        data: {
          etat: etat,
          id_projet: id_projet,

        },
        success: function (data) {
          affiche_projet();
          $("#up_message_etat").addClass("alert alert-success").html(data);
          $("#update-etat_employe").modal("toggle");
        },
      });
    }
    $(document).on("click", "#btn-close", function () {
      $("#update_Etat_Employe_Form").trigger("reset");
      $("#up_message_etat").html("");
      $("#up_message_etat").removeClass("alert alert-danger");
      $("#up_message_etat").removeClass("alert alert-sucess");
    });
  });
}




function get_data_client() {
  $(document).on("click", "#btn_modifier_client", function () {
    var updateID = $(this).attr("data-id3");
    $.ajax({
      url: "get_data_client.php",
      method: "post",
      data: {
        update_ID: updateID
      },
      dataType: "JSON",
      success: function (data) {
        $("#idClient").val(data[0]);
        $("#nomEntreprise").val(data[1]);
        $("#emailClient").val(data[2]);
        $("#numTelClient").val(data[3]);
        $("#adresseClient").val(data[4]);
        $("#commentaireClient").val(data[5]);

        $("#update-client").modal("show");
        affiche_client();
        setTimeout(function () {
          if ($("#message_client").length > 0) {
            $("#message_client").remove();
          }
        }, 2500);
      },
    });
  });

}

function update_client() {
  $(document).on("click", "#btn_modifi_client", function () {
    $("#update-client").scrollTop(0);
    var id_client = $("#idClient").val();
    var nom_entreprise = $("#nomEntreprise").val();
    var email_client = $("#emailClient").val();
    var numTel_client = $("#numTelClient").val();
    var adresse_client = $("#adresseClient").val();
    var commentaire_client = $("#commentaireClient").val();

    if (nom_entreprise == "" || email_client == "" || numTel_client == "" || adresse_client == "" ) {
      $("#update-client").modal("show");
      $("#message")
        .addClass("alert alert-danger")
        .html("Veuillez remplir tous les champs obligatoires !");
    } else {
      $.ajax({
        url: "update_client.php",
        method: "post",
        data: {
          id_client: id_client,
          nom_entreprise: nom_entreprise,
          email_client: email_client,
          numTel_client: numTel_client,
          adresse_client: adresse_client,
          commentaire_client: commentaire_client,
        },
        
        success: function (data) {
          affiche_client();
          $("#update-client").modal("toggle");
          $("#message_client_update").addClass("alert alert-success").html(data);
          setTimeout(function () {
            if ($("#message_client_update").length > 0) {
              $("#message_client_update").remove();
            }
          }, 2500);
        },
      });
    }
    $(document).on("click", "#btn-close", function () {
      $("#update_client_Form").trigger("reset");
      $("#message").html("");
      $("#message").removeClass("alert alert-danger");
      $("#message").removeClass("alert alert-sucess");
    });
  });
}





function delete_client() {
  $(document).on("click", "#btn_supprimer_client", function () {
    var Delete_ID = $(this).attr("data-id4");
    $("#delete_client").modal("show");
    $(document).on("click", "#btn_delete_client", function () {
      $.ajax({
        url: "delete_client.php",
        method: "post",
        data: {
          DeleteID: Delete_ID
        },        
        success: function (data) {
          affiche_client();
          $("#message_client_update").addClass("alert alert-success").html(data);
          $("#delete_client").modal("toggle");
          setTimeout(function () {
            if ($("#message_client_update").length > 0) {
              $("#message_client_update").remove();
            }
          }, 2500);
        },
      });
    });
    $(document).on('hide.bs.modal', '#delete_client', function () {
      Delete_ID = "";
    });
  });
}



function get_domainepersonne_data() {
  $(document).on("click", "#btn_affect_projet", function () {
    var id_projet = $(this).attr("data-id3");
    $.ajax({
      url: "get_data_projet.php",
      method: "post",
      data: {
        update_ID: id_projet
      },
      dataType: "JSON",
      
      success: function (data) {
        $("#id_projet").val(data[0]);
        $("#affect_projet").modal("show");
        affiche_projet();
        setTimeout(function () {
          if ($("#message_projet").length > 0) {
            $("#message_projet").remove();
          }
        }, 2500);
      },
    });
  });
}


function affectation_projet() {
  $(document).on("click", "#btn_affecter_projet", function () {
    $("#affect_projet").scrollTop(0);
    var id_projet = $("#id_projet").val();
    var IDemploye = $("#list_employe").val();
   
      $.ajax({
        url: "affecter_Emplye.php",
        method: "post",
        data: {
          id_projet: id_projet,
          IDemploye: IDemploye
        },
        success: function (data) {
          affiche_projet();
          $("#message").addClass("alert alert-success").html(data);
          $("#affect_projet").modal("toggle");
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 2500);
        },
      });

    $(document).on("click", "#btn-close", function () {
      $("#affect_projet_Form").trigger("reset");
      $("#message").html("");
      $("#message").removeClass("alert alert-danger");
      $("#message").removeClass("alert alert-sucess");
    });
  });
}



function ajoutConge() {
  $(document).on("click", "#btn_ajout_conge", function () {

    var id_employe = $("#id_employe").val();
    var raisonConge = $("#raisonConge").val();
    var autre = $("#autre").val();
    var debutConge = $("#debutConge").val();
    var FinConge = $("#FinConge").val();
    var description =$("#description").val();
    if (raisonConge == null) {
      $("#raisonConge_error").html("Choisir la raison s'il vous plait.");
      $("#raisonConge_error").show();
      $("#raisonConge").focus();
      return false;
    } else if (debutConge == "") {
      $("#debutConge_error").html("Choisir le début de congé.");
      $("#debutConge_error").show();
      $("#debutConge").focus();
      return false;
    } else if (FinConge == "") {
      
      $("#FinConge_error").html("Choisir la fin de congé.");
      $("#FinConge_error").show();
      $("#FinConge").focus();
      return false;

    } else {
      var form_data = new FormData();
      form_data.append("id_employe", id_employe);
      form_data.append("raisonConge", raisonConge);
      form_data.append("autre", autre);
      form_data.append("debutConge", debutConge);
      form_data.append("FinConge", FinConge);
      form_data.append("description", description);
    
      $.ajax({
        url: "ajout_Conge.php",
        method: "post",
        processData: false,
        contentType: false,
        data: form_data,
        success: function (data) {
          $("#message").addClass("alert alert-success").html(data);
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 2500);
        },
      });
    }
    
  });
}



function affiche_Liste_conge() {
  $.ajax({
    url: "affiche_Liste_conge.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#liste_conge").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}


function affiche_Liste_conge_refuse() {
  $.ajax({
    url: "affiche_Liste_conge_refuse.php",
    method: "post",
    success: function (data) {
      try {
        data = $.parseJSON(data);
        if (data.status == "success") {
          $("#liste_conge_refus").html(data.html);
        }
      } catch (e) {
        console.error("Invalid Response!");
      }
    },
  });
}




function get_etat_conge() {
  $(document).on("click", "#btn_modifier_etat_conge", function () {
    var updateID = $(this).attr("data-id");

    $.ajax({
      url: "get_etat_conge.php",
      method: "post",
      data: {
        update_ID: updateID
      },
      dataType: "JSON",
      success: function (data) {
        $("#etat").val(data[0]);
        $("#etat_conge").val(data[1]);

        $("#update-etat_conge").modal("show");
        affiche_Liste_conge();
        setTimeout(function () {
          if ($("#message").length > 0) {
            $("#message").remove();
          }
        }, 2500);
      },
    });
  });
}

function update_etat_conge() {
  $(document).on("click", "#btn_modifi_etat_conge", function () {
    $("#update-etat_conge").scrollTop(0);
    var id_conge = $("#etat_conge").val();
    var etat = $("#etat").val();
    if (etat == "") {
      $("#message")
        .addClass("alert alert-danger")
        .html("Veuillez choisir le champs etat obligatoire !");
      $("#update-etat_conge").modal("show");
    } else {
      $.ajax({
        url: "update_etat_conge.php",
        method: "post",
        data: {
          etat: etat,
          id_conge: id_conge,

        },
        success: function (data) {
          affiche_Liste_conge();
          $("#message").addClass("alert alert-success").html(data);
          $("#update-etat_conge").modal("toggle");
        },
      });
    }
    $(document).on("click", "#btn-close", function () {
      $("#update-etat_conge_Form").trigger("reset");
      $("#message").html("");
      $("#message").removeClass("alert alert-danger");
      $("#message").removeClass("alert alert-sucess");
    });
  });
}



function delete_facture() {
  $(document).on("click", "#btn_supprimer_facture", function () {
    var Delete_ID = $(this).attr("data-id");
    $("#delete_facture").modal("show");
    $(document).on("click", "#btn_delete_facture", function () {
      $.ajax({
        url: "delete_facture.php",
        method: "post",
        data: {
          DeleteID: Delete_ID
        },
        success: function (data) {
          affiche_liste_facture();
          $("#message").addClass("alert alert-success").html(data);
          $("#delete_facture").modal("toggle");
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 2500);
        },
      });
    });
    $(document).on('hide.bs.modal', '#delete_facture', function () {
      Delete_ID = "";
    });
  });
}



function delete_fiche_paie() {
  $(document).on("click", "#btn_supprimer_fiche_paie", function () {
    var Delete_ID = $(this).attr("data-id1");
    $("#delete").modal("show");
    $(document).on("click", "#delete_fiche_paie", function () {
      $.ajax({
        url: "delete_fiche_paie.php",
        method: "post",
        data: {
          DeleteID: Delete_ID
        },
        success: function (data) {
          affiche_liste_fiche_paie();
          $("#message").addClass("alert alert-success").html(data);
          $("#delete").modal("toggle");
          setTimeout(function () {
            if ($("#message").length > 0) {
              $("#message").remove();
            }
          }, 3500);
        },
      });
    });
    $(document).on('hide.bs.modal', '#delete_facture', function () {
      Delete_ID = "";
    });
  });
}



function get_data_fichePaie() {
  $(document).on("click", "#btn_modifier_fiche_paie", function () {
    var updateID = $(this).attr("data-id");

    $.ajax({
      url: "get_data_fichePaie.php",
      method: "post",
      data: {
        update_ID: updateID
      },
      dataType: "JSON",
      success: function (data) {
        $("#list_employe").val(data[0]);
        $("#prime").val(data[1]);
        $("#Conge_mois").val(data[2]);
        $("#mois").val(data[3]) 
        $("#annee").val(data[4]);
        $("#idFichePaie").val(data[5]);

        $("#update-fichePaie").modal("show");
        affiche_liste_fiche_paie();
        setTimeout(function () {
          if ($("#message").length > 0) {
            $("#message").remove();
          }
        }, 3500);
      },
    });
  });
}


function update_fichePaie() {
  $(document).on("click", "#btn_modifi_fichePaie", function () {
   $("#update-fichePaie").scrollTop(0);

   var list_employe = $("#list_employe").val();
   var prime = $("#prime").val();
   var Conge_mois = $("#Conge_mois").val();
   var mois = $("#mois").val() 
   var annee = $("#annee").val();
   var idFichePaie = $("#idFichePaie").val();

   if (list_employe == null && prime =="" && Conge_mois == null && mois == null && annee =="" ) {
    alert("Remplir le Formulaire!")
  } else {
      $.ajax({
        url: "update_fichePaie.php",
        method: "post",
        data: {
          list_employe: list_employe,
          prime: prime,
          Conge_mois: Conge_mois,
          mois: mois,
          annee: annee,
          idFichePaie: idFichePaie,
          
        },
        success: function (data) {
          affiche_liste_fiche_paie();
          $("#message").addClass("alert alert-success").html(data);
          $("#update-fichePaie").modal("toggle");
        },
      });
    }
    $(document).on("click", "#btn-close", function () {
      $("#update_fichePaie_Form").trigger("reset");
      $("#message").html("");
      $("#message").removeClass("alert alert-danger");
      $("#message").removeClass("alert alert-sucess");
    });
  });
}



function get_data_employe() {
  $(document).on("click", "#btn_modifier_employee", function () {
    var updateID = $(this).attr("data-id2");
    $.ajax({
      url: "get_data_employe.php",
      method: "post",
      data: {
        update_ID: updateID
      },
      dataType: "JSON",
      success: function (data) {
        $("#idEmploye").val(data[0]);
        $("#nomEmploye").val(data[1]);
        $("#prenomEmploye").val(data[2]);
        $("#numTelEmploye").val(data[3]);
        $("#emailEmploye").val(data[4]);
        $("#numCINEmploye").val(data[5]);
        $("#poste").val(data[6]);
        $("#salaire").val(data[7]);
        
        $("#update-employe").modal("show");
        liste_employes();
        setTimeout(function () {
          if ($("#message").length > 0) {
            $("#message").remove();
          }
        }, 2500);
      },
    });
  });

}
function update_employe() {
  $(document).on("click", "#btn_modifi_employe", function () {

    var idEmploye = $("#idEmploye").val();
    var nomEmploye = $("#nomEmploye").val();
    var prenomEmploye = $("#prenomEmploye").val();
    var numTelEmploye = $("#numTelEmploye").val();
    var emailEmploye= $("#emailEmploye").val();
    var  numCINEmploye=$("#numCINEmploye").val();
    var poste = $("#poste").val();
    var salaire = $("#salaire").val();

    if (nomEmploye == "" || prenomEmploye == "" || numTelEmploye == "" || emailEmploye == "" || numCINEmploye == "" || salaire == "") {
      $("#update-employe").modal("show");
      $("#messagee")
        .addClass("alert alert-danger")
        .html("Veuillez remplir tous les champs obligatoires !");
    } else {
      $.ajax({
        url: "update_employe.php",
        method: "post",
        data: {
          idEmploye: idEmploye,
          nomEmploye: nomEmploye,
          prenomEmploye: prenomEmploye,
          numTelEmploye: numTelEmploye,
          emailEmploye: emailEmploye,
          numCINEmploye: numCINEmploye,
          poste: poste,
          salaire: salaire,
        },
        success: function (data) {
          liste_employes();
          $("#update-employe").modal("toggle");
          $("#message_up").addClass("alert alert-success").html(data);
          setTimeout(function () {
            if ($("#message_up").length > 0) {
              $("#message_up").remove();
            }
          }, 2500);
        },
      });
    }
    $(document).on("click", "#btn-close", function () {
      $("#update_employe_Form").trigger("reset");
      $("#message").html("");
      $("#message").removeClass("alert alert-danger");
      $("#message").removeClass("alert alert-sucess");
    });
  });
}


function get_fiche_paie() {
  $(document).on("click", "#btn_download_fiche_paie", function () {
    var ID = $(this).attr("data-id2");
    window.open("fpdf/fichePaie.php?id=" + ID, '_blank');
  });
}
