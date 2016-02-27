#Magento Dynamic Block Product Category

Questo modulo nasce dalla necessità di visualizzare dei blocchi statici in vista prodotto, relativi alla categoria di appartenenza del prodotto stesso.

Ad esempio:

In vista prodotto, un blocco statico specifico deve essere visualizzato per tutti i prodotti appartenenti alla categoria scarpe (o categorie figlie), un altro invece deve essere visualizzato per la categoria magliette, un altro ancora per la categoria orologi.

##Come usare:

* Segnare gli ID delle categorie interessate (ad es. 15, 26, 40)
* creare un blocco statico per ogni ID categoria, l'*identificatore* **deve** iniziare così `category{ID}-il_mio_blocco_statico`. Ad es. `category40-il_mio_blocco_statico`
* aggiungere nel file `catalog/product/view.phtml`, posizionandolo dove i vuol far visualizzare il blocco, la seguente stringa `echo $this->getChildHtml('dynamic_block_product_category');`

##Installazione

Scaricare il repository ZIP e scompattarlo nella propria root di Magento

*oppure*

questo modulo è installabile attraverso *composer* aggiungendo le seguenti righe al proprio composer.json

```js
{
    "require":[
        ...
        "vmasciotta/magento-dynamicblockproductcategory":"1.*"
        ...
    ],
    "repositories":[
        ...
        {"type": "vcs", "url":"https://github.com/vmasciotta/magento-dynamicblockproductcategory.git"}
        ...
    ]
}
```