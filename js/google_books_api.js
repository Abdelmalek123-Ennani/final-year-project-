

let container = document.querySelector('.livres .row');
let form_submit = document.querySelector('.form_submit');

async function get_books(search = 'search+terms') {
    const request = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${search}&maxResults=30`);
    const data = await request.json();

    console.log(data.items);
    
    data.items.forEach(el => {
        let title = el.volumeInfo.title;
        let imageBook = el.volumeInfo.imageLinks ? el.volumeInfo.imageLinks.thumbnail : './images/c3.jpg';
        let linkRead = el.volumeInfo.previewLink;
        let publisherOne = el.volumeInfo.publisher;
        // let bookIbn = el.volumeInfo.industryIdentifiers[1].identifier;
        let author = el.volumeInfo.authors;

        // let divWrap = document.createElement('div');
        // let img = document.createElement('img');
        // let titleHeader = document.createElement('h6');
        // let overlay = document.createElement('div');

        // overlay.className = "overlay";
        // divWrap.classList = "col-md-4 col-sm-6 col-12 p-1 position-relative";
        // titleHeader.innerHTML = title;
        // img.src = imageBook;

        // divWrap.append(img);
        // divWrap.append(overlay);
        // divWrap.append(titleHeader);

        // container.append(divWrap)

        // let div = `
        // <div class="col-md-4 col-sm-6 col-12 p-1 position-relative">
        //     <img src=${imageBook} alt="img" class="w-100 h-100" />
        //     <div class="overlay"></div>
        //     <h6>${title}</h6>
        //  </div>
        // `;

        var htmlCard = `<div class="col-12 col-md-5 mx-1 my-1">
                            <div class="card" style="">
                            <div class="row no-gutters">
                                <div class="col-2 col-md-4">
                                 <img src="${imageBook}" class="card-img" alt="...">
                                </div>
                                <div class="col-6 col-md-8">
                                <div class="card-body ml-3 mt-3">
                                    <h5 class="card-title">${title}</h5>
                                    <p class="card-text">Author: ${author}</p>
                                    <p class="card-text">Publisher: ${publisherOne}</p>
                                    <a target="_blank" href="${linkRead}" class="btn btn-secondary">Lire Livre</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>`;

        container.innerHTML += htmlCard;

    });

}
    get_books();


form_submit.addEventListener('submit' , (e) => {
      e.preventDefault();
      let livre_nom = document.querySelector('.livre_nom');

      console.log(livre_nom);

      if ( livre_nom.value.length == 0 ) {

      }else {
        container.innerHTML = '';
        get_books(livre_nom.value);
      }
})

