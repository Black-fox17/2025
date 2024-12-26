const { algoliasearch, instantsearch } = window;

const searchClient = algoliasearch('5TE814F15R', 'f41fad4c8a7ee10a31df32a24860b97d');

const search = instantsearch({
  indexName: 'products',
  searchClient,
  future: { preserveSharedStateOnUnmount: true },
  
});


search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: (hit, { html, components }) => html`
<article>
  <img src=${ hit.products.0.image_url } alt=${ hit.products.0.name } />
  <div>
    <h1>${components.Highlight({hit, attribute: "products.0.name"})}</h1>
    <p>${components.Highlight({hit, attribute: "products.0.description"})}</p>
    <p>${components.Highlight({hit, attribute: "products.0.price"})}</p>
  </div>
</article>
`,
    },
  }),
  instantsearch.widgets.configure({
    hitsPerPage: 8,
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();

