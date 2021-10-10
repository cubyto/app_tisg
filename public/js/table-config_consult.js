class DataTableCon {
    element;
    headers;
    items;
    copyItems;
    pagination;
    numberOfEntries;
    footerButtons;


    constructor(selector, footerButtons) {
        this.element = document.querySelector(selector);

        this.headers = [];
        this.items = [];
        this.pagination = {
            total: 0,
            noItemsPerPage: 0,
            noPages: 0,
            actual: 0,
            pointer: 0,
            diff: 0,
            lastPageBeforeDots: 0,
            noButtonsBeforeDots: 4
        };
        this.numberOfEntries = 12;
        this.footerButtons = footerButtons;
    }

    parseCon() {
        const headers = [...this.element.querySelector('thead tr').children];
        const trs = [...this.element.querySelector('tbody').children];

        headers.forEach(element => {
            this.headers.push(element.textContent);
        });

        console.log(this.headers);

        trs.forEach(tr => {
            const cells = [...tr.children];

            const item = {
                id: this.generateUUID(),
                values: []
            };

            cells.forEach(cell => {
                if (cell.children.length > 0) {
                    const edit = [...cell.children][0].getAttribute('class');

                    if (edit !== null) {
                        item.values.push(`<i class="${edit}"></i>`);
                    }
                } else {
                    item.values.push(cell.textContent);
                }
            });
            this.items.push(item);
        });
        console.log(this.items);

        this.makeTable();
    }

    makeTable() {
        this.copyItems = [...this.items];

        this.initPagination(this.items.length, this.numberOfEntries);

        const container = document.createElement('div');
        container.id = this.element.id;
        this.element.innerHTML = '';
        this.element.replaceWith(container);
        this.element = container;

        this.createHTML();
        this.renderHeaders();
        this.renderRows();
        this.renderPagesButtons();
        this.renderFooterButtons();
        this.renderSearch();
    }

    initPagination(total, entries) {
        this.pagination.total = total;
        this.pagination.noItemsPerPage = entries;
        this.pagination.noPages = Math.ceil(this.pagination.total / this.pagination.noItemsPerPage);
        this.pagination.actual = 1;
        this.pagination.pointer = 0;
        this.pagination.dif = this.pagination.noItemsPerPage - (this.pagination.total % this.pagination.noItemsPerPage);
    }

    generateUUID() {
        return (Date.now() * Math.floor(Math.random() * 100000)).toString();
    }

    createHTML() {
        this.element.innerHTML = `
        <div class="tabConstainer-consult">
        <table id="dataTableCon" class="datatable-consult">
          <thead>
            <tr>
            </tr>
          </thead>
          <tbody id="tabConsult"></tbody>
        </table>
        <div class="footer-consult">
        <i class="button-share fas fa-share-alt"></i>
          <div class="pages-consult">
          </div>
        </div>
      </div>
    `;

    }

    renderHeaders() {
        this.element.querySelector('thead tr').innerHTML = '';

        this.headers.forEach(header => {
            this.element.querySelector('thead tr').innerHTML += `<th>${header}</th>`;
        });
    };
    renderRows() {
        this.element.querySelector('tbody').innerHTML = '';

        let i = 0;
        const {
            pointer,
            total
        } = this.pagination;
        const limit = this.pagination.actual * this.pagination.noItemsPerPage;

        for (i = pointer; i < limit; i++) {
            if (i === total) break;

            const {
                id,
                values
            } = this.copyItems[i];

            let data = '';

            //let valuelenght = this.items.values.length;
            
            values.forEach(cell => {
                data += `<td>${cell}</td>`
            });

            this.element.querySelector('tbody').innerHTML += `<tr>${data}</tr>`;
        }

    };
    renderPagesButtons() {
        const pagesContainer = this.element.querySelector('.pages-consult');
        let pages = '';

        const buttonsToShow = this.pagination.noButtonsBeforeDots;
        const actualIndex = this.pagination.actual;

        let limit = Math.max(actualIndex - 2, 1);
        let limS = Math.min(actualIndex + 2, this.pagination.noPages);
        const missinButtons = buttonsToShow - (limS - limit);

        if (Math.max(limit - missinButtons, 0)) {
            limit = limit - missinButtons;
        } else if (Math.min(limS + missinButtons, this.pagination.noPages) !== this.pagination.noPages) {
            limS = limS + missinButtons;
        }

        if (limS < (this.pagination.noPages - 2)) {
            pages += this.getIteratedButtons(limit, limS);
            pages += '<li>...</li>';
            pages += this.getIteratedButtons(this.pagination.noPages - 1, this.pagination.noPages)
        } else {
            pages += this.getIteratedButtons(limit, this.pagination.noPages);
        }

        pagesContainer.innerHTML = `<ul>${pages}</ul>`;

        this.element.querySelectorAll('.pages-consult li button').forEach(button => {
            button.addEventListener('click', e => {
                this.pagination.actual = parseInt(e.target.getAttribute('data-page'));
                this.pagination.pointer = (this.pagination.actual * this.pagination.noItemsPerPage) - this.pagination.noItemsPerPage;
                this.renderRows();
                this.renderPagesButtons();
            });
        });
    };

    getIteratedButtons(start, end) {
        let res = '';
        for (let i = start; i <= end; i++) {
            if (i === this.pagination.actual) {
                res += `<li><span class="active">${i}</span></li>`
            } else {
                res += `<li><button data-page="${i}">${i}</button></li>`;
            }
        }

        return res;
    }

    renderFooterButtons() {
        let html = '';
        const buttonsContainer = this.element.querySelectorAll('.footer-consult');
        const footerButtons = this.footerButtons;

        footerButtons.forEach(button =>{
            html += `<i id="${button.id} class="${button.icon}"></i>`
        })
    };

    renderSearch() {
        document.querySelector('#inputconsult').addEventListener('input', e =>{
            const query = e.target.value.trim().toLowerCase();

            if(query === ''){
                this.copyItems = [...this.items];
                this.initPagination(this.copyItems.length, this.numberOfEntries);
                this.renderRows();
                this.renderPagesButtons();
                return;
            }

            this.search(query);

            this.initPagination(this.copyItems.length, this.numberOfEntries);
            this.renderRows();  
            this.renderPagesButtons();
        })
    }
    search(query) {
        let res = [];
        
        this.copyItems = [...this.items];
        //find the match
        for(let i = 0; i < this.copyItems.length; i++){
            const {id, values} = this.copyItems[i];
            const row = values;

            for(let j = 0; j < row.length; j++){
                const cell = row[j];

                if(cell.toLowerCase().indexOf(query) >= 0){
                    res.push({id: id, values: row});
                    break;
                }
            }    
        }
        this.copyItems = [...res];
    }
}