{"version":3,"sources":["img.js"],"names":["BX","namespace","attr","Landing","Utils","data","encodeDataValue","decodeDataValue","Block","Node","Img","options","apply","this","arguments","type","editPanel","lastValue","field","uploadParams","isGrouped","node","addEventListener","onClick","bind","isAllowInlineEdit","setAttribute","Loc","getMessage","isBackground","nodeName","isImage","isIcon","getBackgroundUrl","style","getAttribute","res","split","match","replace","getBackgroundUrl2x","getFileId","fileId","parseInt","dataset","fileid","getFileId2x","fileid2x","getAlt","alt","getPseudoUrl","url","getImageSrc","src","getImageSrc2x","setImageValue","value","newNode","create","attrs","data-fileid","id","parentNode","insertBefore","remove","srcset","src2x","id2x","setBackgroundValue","backgroundImage","join","removeProperty","prototype","__proto__","constructor","event","manifest","allowInlineEdit","Main","getInstance","isControlsEnabled","Text","currentNode","isEditable","UI","Panel","StylePanel","isShown","preventDefault","stopPropagation","Button","FontAction","hideAll","ColorAction","Content","selector","title","className","appendFooterButton","BaseButton","text","save","hide","document","body","appendChild","layout","form","Form","BaseForm","name","addField","getField","clear","appendForm","show","EditorPanel","forms","fields","getValue","JSON","stringify","setValue","description","dimensions","width","maxWidth","minWidth","height","maxHeight","minHeight","disableLink","closest","Field","Image","content","disableAltField","requestAnimationFrame","adjustPreviewBackgroundSize","preventSave","preventHistory","decodeURIComponent","onChange","History","push","Entry","block","getBlock","command","undo","redo","href","target","enabled"],"mappings":"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","file":"img.map.js"}