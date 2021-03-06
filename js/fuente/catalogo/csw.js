//------------------------------------------------------------------------------------------------

/* CSW, DONDE SE DEFINEN TODAS LAS OPERACIONES POSIBLES A REALIZAR:

YA IMPLEMENTADAS:

	* GetCapabilities
	* GetRecords
	* GetRecordById
	* GetDomain

*/

Ows4js.Csw ={};

Ows4js.Csw = function(url, config) {
    this.version = '2.0.2';
    /**
     * Jsonix Configuration
     * */
    if (config == null){
        throw 'Missing Configuration! It is a must to CSW to know the profile';
    } else if (config[2] != undefined){
        this.credentials = config[2];
    }
    Ows4js.Csw.jsonnixContext = new Jsonix.Context(config[0], config[1]);
    // init by doing a GetCapabilities and parsing metadata
    this.url = url;
};



/**
 * Operation name: GetCapabilities
 *
 */

Ows4js.Csw.prototype.GetCapabilities = function(){
    var getCapabilities = new Ows4js.Csw.GetCapabilities();
    // XML to Post.
    var myXML = Ows4js.Csw.marshalDocument(getCapabilities);
    var me = this;
    return Ows4js.Util.httpPost(this.url, "application/xml", myXML, this.credentials).then(function(responseXML){
        var capabilities;
        capabilities = Ows4js.Csw.unmarshalDocument(responseXML);
        //console.log(capabilities);
        me.serviceIdentification = capabilities['csw:Capabilities'].serviceIdentification;
        me.serviceProvider = capabilities['csw:Capabilities'].serviceProvider;
        me.operationsMetadata = capabilities['csw:Capabilities'].operationsMetadata;
        me.filterCapabilities = capabilities['csw:Capabilities'].filterCapabilities;
        //console.log(responseXML);
		return me;
    });
};




/**
 * Operation name: GetRecords
 *
 * */

Ows4js.Csw.prototype.GetRecords = function(startPosition, maxRecords, filter, outputSchema) {

    var query;
    if (filter === undefined || filter === null) {
        query = new Ows4js.Csw.Query('full');
    } else {
        // Create Query
        query = new Ows4js.Csw.Query('full', new Ows4js.Csw.Constraint(filter));
    }
    // Create de GetRecords Action.
    var recordAction = new Ows4js.Csw.GetRecords(startPosition, maxRecords, query, outputSchema);
    // XML to Post.
    var myXML = Ows4js.Csw.marshalDocument(recordAction);
    // Post XML
    return Ows4js.Util.httpPost(this.url, "imagorbis", myXML, this.credentials).then(function(responseXML){
        //console.log(responseXML);

	// En origen, se devolv??a el resultado en JSON utilizando el archivo jsonix.js, pero no funciona con el campo dc:uri.
	// Por eso, el resultado se devuelve aqu?? en xml, y se transforma a JSON en el archivo GetRecords.html; a trav??s de la funci??n xmltoJSON alojada en el archivo xmltojson.js.
	//return Ows4js.Csw.unmarshalDocument(responseXML);
	return responseXML;
    });

};

Ows4js.Csw.marshalDocument = function(object){
    return Ows4js.Csw.jsonnixContext.createMarshaller().marshalDocument(object);
};

Ows4js.Csw.unmarshalDocument = function(xml){
    return Ows4js.Csw.jsonnixContext.createUnmarshaller().unmarshalDocument(xml);
};

// To simplify de API.
Ows4js.Csw.xmlToObject = function(xml){
    return Ows4js.Csw.unmarshalDocument(xml);
};

Ows4js.Csw.objectToXML = function(object){
    return Ows4js.Csw.marshalDocument(object);
};

Ows4js.Csw.unmarshalString = function(string){
    return Ows4js.Csw.jsonnixContext.createUnmarshaller().unmarshalString(string);
};

/**
 * Operation name: GetRecordById
 **/

Ows4js.Csw.prototype.GetRecordById = function(id_list) {
    var byIdAction = new Ows4js.Csw.GetRecordById(id_list);
    //console.log(byIdAction);
    var myXML = Ows4js.Csw.marshalDocument(byIdAction);
    //console.log(myXML);
    return Ows4js.Util.httpPost(this.url, "application/xml", myXML, this.credentials).then(function(responseXML){
        //console.log(responseXML);
		//return Ows4js.Csw.unmarshalDocument(responseXML); // Utilizando jsonix
		return xmlToJSON.parseXML(responseXML); //Utilizando la funci??n creada arriba.
    });
};

Ows4js.Csw.prototype.getOperationByName = function(name) {
    return  this.operationsMetadata.operation.filter(function(element){
        return element.name === name;
    })[0];
};

/**
 * Operation name: GetDomain
 * */

Ows4js.Csw.prototype.GetDomain = function(propertyName){
    var getdomainAction = new Ows4js.Csw.GetDomain(propertyName);
    var myXML = Ows4js.Csw.marshalDocument(getdomainAction);
    //console.log(myXML);
    return Ows4js.Util.httpPost(this.url, "application/xml", myXML, this.credentials).then(function(responseXML){
        //console.log(responseXML);
		//return Ows4js.Csw.unmarshalDocument(responseXML); // Utilizando jsonix
		return xmlToJSON.parseXML(responseXML); //Utilizando la funci??n creada arriba.
    });
};


/*
NO IMPLEMENTADAS:

	* Transaction:
		- Insert
		- Update
		- Delete
*/

/**
 * Operation name: Insert
 */

Ows4js.Csw.prototype.insertRecords = function (records){
    var transactionAction = new Ows4js.Csw.Insert(records);
    var transaction = new Ows4js.Csw.Transaction(transactionAction);
    //console.log(transaction);
    var myXML = Ows4js.Csw.marshalDocument(transaction);
    //console.log(myXML);
    return Ows4js.Util.httpPost(this.url, "application/xml", myXML, this.credentials).then(function(responseXML){
      //  console.log(responseXML);
		return Ows4js.Csw.unmarshalDocument(responseXML);
    });
};

/**
 * Operation name: Update
 */

Ows4js.Csw.prototype.updateRecord = function(records){
    var transactionAction = new Ows4js.Csw.Update(records);
    var transaction = new Ows4js.Csw.Transaction(transactionAction);
    //console.log(transaction);
    var myXML = Ows4js.Csw.marshalDocument(transaction);
    //console.log(myXML);
    return Ows4js.Util.httpPost(this.url, "application/xml", myXML, this.credentials).then(function(responseXML){
        return Ows4js.Csw.unmarshalDocument(responseXML);
    });
};

/**
 * Operation name: Delete
 */
Ows4js.Csw.prototype.deleteRecords = function(filter){
    var transactionAction = new Ows4js.Csw.Delete(filter);
    var transaction = new Ows4js.Csw.Transaction(transactionAction);
    var myXML = Ows4js.Csw.marshalDocument(transaction);
    //console.log(myXML);
    return Ows4js.Util.httpPost(this.url, "application/xml", myXML, this.credentials).then(function(responseXML){
        return Ows4js.Csw.unmarshalDocument(responseXML);
    });
};

/**
 * Templates for Requests
 * */

/**
 * Constraint Request Template
 * */

Ows4js.Csw.Constraint = function(filter){
    this.TYPE_NAME = "CSW_2_0_2.QueryConstraintType";
    this.version = "1.1.0";
    this.filter = filter;
};

/**
 * GetRecords Request Template
 *
 * This Objects already use the simple mapping style from jsonix
 * */

Ows4js.Csw.GetRecords = function(startPosition, maxRecords, query, outputSchema){
    this['csw:GetRecords'] = {
        TYPE_NAME: "CSW_2_0_2.GetRecordsType",
        abstractQuery: query,
        startPosition: startPosition,
        maxRecords: maxRecords,
        resultType: "results",
        service: "CSW",
        version: "2.0.2"
    };

    if (outputSchema){
        this['csw:GetRecords'].outputSchema = outputSchema;
    }

    //console.log(this);
};

/**
 * GetRecordById Request Template
 *
 * This Objects already use the simple mapping style from jsonix
 * */

Ows4js.Csw.GetRecordById = function(ids){
    this['csw:GetRecordById'] ={
        TYPE_NAME: "CSW_2_0_2.GetRecordByIdType",
        elementSetName: {
            ObjectTYPE_NAME: "CSW_2_0_2.ElementSetNameType",
            value: "full"
        },
        id: ids,
        service :  "CSW",
        version : "2.0.2"
    };
};

/**
 * Query Request Template
 *
 * This Objects already use the simple mapping style from jsonix
 * */

Ows4js.Csw.Query = function(elementSetName, constraint){
    this['csw:Query'] = {
        TYPE_NAME: "CSW_2_0_2.QueryType",
        elementSetName : {
            TYPE_NAME: "CSW_2_0_2.ElementSetNameType",
            value: elementSetName
        },
        typeNames : [
            {
                key: "{http://www.opengis.net/cat/csw/2.0.2}Record",
                localPart: "Record",
                namespaceURI: "http://www.opengis.net/cat/csw/2.0.2",
                prefix: "csw",
                string: "{http://www.opengis.net/cat/csw/2.0.2}csw:Record"
            }
        ]
    };
    if (constraint){
        this['csw:Query'].constraint = constraint;
    }
};

/**
 * GetDomain Request Template
 *
 * This Objects already use the simple mapping style from jsonix
 * */

Ows4js.Csw.GetDomain = function (propertyName){
    this['csw:GetDomain'] ={
        TYPE_NAME: "CSW_2_0_2.GetDomainType",
        propertyName: propertyName,
        service: "CSW",
        version: "2.0.2"
    };
};

/**
 * GetCapabilities Request Template
 *
 * This Objects already use the simple mapping style from jsonix
 * The GetCapabilities should be on the Ows.js ?
 */
Ows4js.Csw.GetCapabilities = function () {
    this["csw:GetCapabilities"] = {
        "TYPE_NAME":"CSW_2_0_2.GetCapabilitiesType",
        "service":"CSW",
        "acceptVersions": {
            "TYPE_NAME":"OWS_1_0_0.AcceptVersionsType",
            "version":["2.0.2"]
        },
        "acceptFormats": {
            "TYPE_NAME": "OWS_1_0_0.AcceptFormatsType",
            "outputFormat":["application/xml"]
        }
    }
};

/**
 * Transaction Request Template
 */

Ows4js.Csw.Transaction = function(action){
  this['csw:Transaction'] = {
      'TYPE_NAME': "CSW_2_0_2.TransactionType",
      insertOrUpdateOrDelete: [action],
      service: "CSW",
      version: "2.0.2"
  }
};

/**
 * Insert template
 */

Ows4js.Csw.Insert = function(records){
    this.TYPE_NAME =  "CSW_2_0_2.InsertType";
    this.any = records;
};

/**
 * Update Template
 */

Ows4js.Csw.Update = function(records) {
    this.TYPE_NAME =  "CSW_2_0_2.UpdateType";
    this.any = records;
};

/**
 * Delete Template
 */

Ows4js.Csw.Delete = function(filter){
    this.TYPE_NAME = "CSW_2_0_2.DeleteType";
    this.constraint = {
        TYPE_NAME: "CSW_2_0_2.QueryConstraintType",
        filter : filter,
        version: "1.1.0"
    };
};
