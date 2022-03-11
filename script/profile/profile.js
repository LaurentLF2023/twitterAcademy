

fetch('../../Controller/profile/profile_infos.php', {
    method: 'get',
}).then(reponse => {
    return reponse.json()
}).then(json => {
    console.log(json)

    let infos = json.infos
    let card = document.getElementById('profile-card');
    for (let data in infos) {
        let path = ""
        if(infos[data]['path'] != null) {
          path = infos[data]['path']
        } else {
          path = "/assets/icon.jpeg"
        }
        console.log(path)
        card.innerHTML = `
        <div class="upper">
            <img src="/assets/banner.jpeg">
        </div>
        <div class="user text-center d-flex justify-content-center">
            <div class="profile rounded-circle">
                <img src="${path}" class="rounded-circle" data-name='profilPic' width="80" onclick='myFileInput(this)'>
                <form method="post" id="form" enctype="multipart/form-data">
                  <input type='file' id='profilPic' name='profilPic' onchange='uploadPic(this)' hidden>
                </form>
            </div>
        </div>
        <div class="mt-5 text-center">
            <h4 class="mb-0"> ${infos[data]['display_name']}</h4>
            <span class="text-muted d-block mb-4">@${infos[data]['username']}</span>
            <span class="fw-normal d-block mb-4"> ${infos[data]['about']}</span>
            <span class="text-left text-muted font-weight-lighter mb-2"><img src="https://img.icons8.com/windows/32/000000/calendar-week.png"/> Membre depuis ${infos[data]['YEAR(inscription_date)']}
            
            <div class="d-flex justify-content-around align-items-center mt-4 px-4">
                <div class="stats">
                    <h6 class="mb-0">Following</h6> 
                    <span><a href="#">8,797</a></span>
                </div>

                <div class="stats">
                    <h6 class="mb-0">Followers</h6> 
                    <span><a href="#">129</a></span>
                </div>
            </div>
            
            <!-- MODAL EDITION DU PROFIL -->
            <div class="modal bg-modal" id="account-edit" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                  <form class="g-3 mt-3" onsubmit='return false'>
                    <div class="mb-3">
                      <label for="validationServer01" class="form-label">Name</label>
                      <input type="text" class="form-control" name='display_name' id="validationServer01" value="${infos[data]['display_name']}" required>
                    </div>
                    <div class="mb-3">
                      <label for="validationTextarea" class="form-label">Description</label>
                      <textarea class="form-control" name='about' id="validationTextarea" rows="4" required>${infos[data]['about']}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit" onclick='updateProfil(this)'>Enregister les modifications</button>
                  <button type="button" class="btn btn-danger close" data-bs-dismiss="modal">Fermer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          </div>
          </div>
          <hr class="mb-0">
    `

    }
});


/*

if $_GET[p] 
regarder si c'est pas le meme de id session

si $ p de get  = session_id sont les meme
ne pqs afficher le bouton

Display none de base avec la class BS;

Style.display: block

data.target dans le button, qui va permettre de cibler un modal (l'id) en particulier 

*/
