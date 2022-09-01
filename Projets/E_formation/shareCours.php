<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/share.css">
    <link rel="shortcut icon" href="img/logo-epetipas.png" type="logo E-petitpas ">

    <title>E-petitpas</title>

    </head>
    <body>

        <section>
            <div class="blocSection">

                <div>
                    <h3> Envoyer un livrable (compétences)</h3>
                    <form action="">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Choisir la compétence</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </form>
                </div>
                <div class="blocMetier">
                    <div>
                        <form action="">
                            <label for="compétenceSelect" class="form-label">Filière métier</label>
                            <input type="text" class="form-control" name="filiere" id="filiere">
                        </form>
                    </div>
                    <div>
                        <form action="">
                            <label for="compétenceSelect" class="form-label">Matière</label>
                            <input type="text" class="form-control" name="matiere" id="matiere">
                        </form>
                    </div>
                    <div>
                        <form action="">
                            <label for="compétenceSelect" class="form-label">Titre compétence</label>
                            <input type="text" class="form-control" name="titreCompetence" id="matiere">
                        </form>
                    </div>
                </div>
                <div class="blocCheckbox">
                    <label for="flexCheckDefault">Veuillez cocher les notions que vous avez réalisé</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Notion 1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Notion 2</label>
                    </div><div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Notion 3</label>
                    </div><div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Notion 4</label>
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <form action="">
                            <label for="formFile" class="form-label">Document à livrer en .ppt ou en .docx</label>
                            <input class="form-control" type="file" id="formFile">
                        </form>
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <form action="">
                            <label for="formFile" class="form-label">Copie du fichier en .pdf</label>
                            <input class="form-control" type="file" id="formFile">
                        </form>
                    </div>
                </div>
                <form action="">
                    <button type="button" class="btn btn-warning"><b>Envoyer le livrable</b></button>
                </form>
            </div>
        </section>