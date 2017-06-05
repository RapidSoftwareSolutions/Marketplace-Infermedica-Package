[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Infermedica/functions?utm_source=RapidAPIGitHub_InfermedicaFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)
# Infermedica Package

* Domain: [Infermedica](http://infermedica.com/)
* Credentials: appId, appKey

## How to get credentials: 
1. Get appId and appKey from [Infermedica](https://developer.infermedica.com)


## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```

## Infermedica.getAllConditions
Returns a list of all available conditions

| Field   | Type  | Description
|---------|-------|----------
| appId   | credentials| App ID
| appKey  | credentials| App Key
| language| String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getSingleCondition
Returns details of a single condition specified by id parameter

| Field      | Type  | Description
|------------|-------|----------
| appId      | credentials| App ID
| appKey     | credentials| App Key
| conditionId| String| Condition ID (see list in getAllConditions)
| language   | String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.computeDiagnosis
Suggests possible diagnosis and relevant observations based on provided patient information

| Field       | Type   | Description
|-------------|--------|----------
| appId       | credentials | App ID
| appKey      | credentials | App Key
| information | File   | JSON file with patient's data [Example 1](#example1)
| devMode     | Boolean| Use true to exclude a request from further analysis. This is useful when you make requests to the API during development of your application or when running tests. Default: false
| interviewId | String | Use to group requests made during a single interview (i.e. requests made during a single conversation with a chatbot or when filling out a single intake form). Grouping requests can help to better analyze various aspects of API usage (e.g. order of questions asked, changes in condition ranking, average interview duration, or number of questions asked per interview). The Interview-Id value should be a string and you should use the same header value for all related requests. But please make sure you don’t use any of your users or patients’ personal data
| userId      | String | Use to keep track of the end-user who initiated the request in your application. Note that the aim of this property is to compute general statistics of users’ behavior (e.g. number of active users or number of requests per user) and not to track individual users, and Infermedica's policies prohibit including any of your users’ personal details here (e.g. their e-mail or login); instead you should use hashed and anonymized identifiers. The User-Id value should be a string
| language    | String | Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getExplanation
Explains which evidence impact probability of selected condition

| Field       | Type   | Description
|-------------|--------|----------
| appId       | credentials | App ID
| appKey      | credentials | App Key
| information | File   | JSON file with patient's data [Example 2](#example2)
| devMode     | Boolean| Use true to exclude a request from further analysis. This is useful when you make requests to the API during development of your application or when running tests. Default: false
| interviewId | String | Use to group requests made during a single interview (i.e. requests made during a single conversation with a chatbot or when filling out a single intake form). Grouping requests can help to better analyze various aspects of API usage (e.g. order of questions asked, changes in condition ranking, average interview duration, or number of questions asked per interview). The Interview-Id value should be a string and you should use the same header value for all related requests. But please make sure you don’t use any of your users or patients’ personal data
| userId      | String | Use to keep track of the end-user who initiated the request in your application. Note that the aim of this property is to compute general statistics of users’ behavior (e.g. number of active users or number of requests per user) and not to track individual users, and Infermedica's policies prohibit including any of your users’ personal details here (e.g. their e-mail or login); instead you should use hashed and anonymized identifiers. The User-Id value should be a string
| language    | String | Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getDatabaseInfo
Returns information about data used by diagnostic engine

| Field   | Type  | Description
|---------|-------|----------
| appId   | credentials| App ID
| appKey  | credentials| App Key
| language| String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getAllLabTests
Returns a list of all available lab tests.

| Field   | Type  | Description
|---------|-------|----------
| appId   | credentials| App ID
| appKey  | credentials| App Key
| language| String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getSingleLabTest
Returns details of a single lab test specified by id parameter

| Field    | Type  | Description
|----------|-------|----------
| appId    | credentials| App ID
| appKey   | credentials| App Key
| labTestId| String| Lab test ID
| language | String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getSingleMatchingObservation
Returns a single observation matching given phrase

| Field  | Type  | Description
|--------|-------|----------
| appId  | credentials| App ID
| appKey | credentials| App Key
| phrase | String| Expression to search. Example: "nasal speech"
| sex    | String| Male or female

## Infermedica.getMentions
Returns list of mentions of observation found in given text

| Field        | Type   | Description
|--------------|--------|----------
| appId        | credentials | App ID
| appKey       | credentials | App Key
| phrase       | String | Text to parse like 'I have a headache and a cold'
| includeTokens| Boolean| The words and their positions on which the search was made are tied to the result. Default: false
| language     | String | Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getAllRiskFactors
Returns a list of all available risk factors

| Field   | Type  | Description
|---------|-------|----------
| appId   | credentials| App ID
| appKey  | credentials| App Key
| language| String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getSingleRiskFactor
Returns details of a single risk factor specified by id parameter

| Field   | Type  | Description
|---------|-------|----------
| appId   | credentials| App ID
| appKey  | credentials| App Key
| riskId  | String| Risk factor ID
| language| String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getMatchingObservations
Returns list of observations matching the given phrase

| Field     | Type  | Description
|-----------|-------|----------
| appId     | credentials| App ID
| appKey    | credentials| App Key
| phrase    | String| Phrase to match
| sex       | Select| Male or female
| maxResults| Number| Maximum number of results. Default: 8
| type      | Select| In which category to look for a coincidence (symptom, risk_factor or lab_test)
| language  | String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getAllSymptoms
Returns a list of all available symptoms.

| Field   | Type  | Description
|---------|-------|----------
| appId   | credentials| App ID
| appKey  | credentials| App Key
| language| String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.getSingleSymptom
Returns details of a single symptom specified by id parameter

| Field    | Type  | Description
|----------|-------|----------
| appId    | credentials| App ID
| appKey   | credentials| App Key
| symptomId| String| Symptom's id
| language | String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details

## Infermedica.computeTriageLevel
Estimates triage level based on provided patient information

| Field      | Type  | Description
|------------|-------|----------
| appId      | credentials| App ID
| appKey     | credentials| App Key
| information| File  | JSON file with patient's data [Example 3](#example3)
| language   | String| Language code. Default available 3 languages (infermedica-en - English, infermedica-ru - Russian, infermedica-pl - Polish). Default: infermedica-en. Other languages are available in custom plans only. Contact (support@infermedica.com) for more details


#### Exaples

<a name="example1">Example 1</a> (computeDiagnosis)

| Field        | Type   | Required | Description
|--------------|--------|----------|-----------
| sex          | String | required | male or female
| age          | Int    | required | Patient's age
| evidence     | Array  | optional | List of EvidenceType patient's symptoms and status
| extras       | Array  | optional | ?
| evaluated_at | String | optional | Time when evidence was observed in ISO 8601 format. Example: 2017-03-22

EvidenceType 

| Field       | Type   | Required | Description
|-------------|--------|----------|--------------|
| id          | String | required | Symptom's ID (see getAllSymptoms)
| choice_id   | String | required | One of: present, absent or unknown
| observed_at | String | optional | Time when evidence was observed in ISO 8601 format. Example: 2017-03-22
```json
{
  "sex": "male",
  "age": 22,
  "evidence": [
    {
      "id": "s_13",
      "choice_id": "present"
    },
    {
      "id": "s_12",
      "choice_id": "present"
    },
    {
      "id": "s_1782",
      "choice_id": "present"
    },
    {
      "id": "s_98",
      "choice_id": "present"
    },
    {
      "id": "s_100",
      "choice_id": "present"
    }
  ],
  "extras": {}
}
```

<a name="example2">Example 2</a> (getExplanation)

| Field        | Type   | Required | Description
|--------------|--------|----------|-----------
| sex          | String | required | male or female
| age          | Int    | required | Patient's age
| evidence     | Array  | optional | List of EvidenceType patient's symptoms and status
| extras       | Array  | optional | ?
| target       | String | required | Condition ID (see getAllConditions)
| evaluated_at | String | optional | Time when evidence was observed in ISO 8601 format. Example: 2017-03-22

EvidenceType 

| Field       | Type   | Required | Description
|-------------|--------|----------|--------------|
| id          | String | required | Symptom's ID (see getAllSymptoms)
| choice_id   | String | required | One of: present, absent or unknown
| observed_at | String | optional | Time when evidence was observed in ISO 8601 format. Example: 2017-03-22
```json
{
  "sex": "male",
  "age": "22",
  "evidence": [
    {
      "id": "s_13",
      "choice_id": "present"
    },
    {
      "id": "s_12",
      "choice_id": "present"
    },
    {
      "id": "s_1782",
      "choice_id": "present"
    },
    {
      "id": "s_98",
      "choice_id": "present"
    },
    {
      "id": "s_100",
      "choice_id": "present"
    }
  ],
  "extras": {},
  "target": "c_132"
}
```

<a name="example3">Example 3</a> (computeTriageLevel)

| Field        | Type   | Required | Description
|--------------|--------|----------|-----------
| sex          | String | required | male or female
| age          | Int    | required | Patient's age
| evidence     | Array  | optional | List of EvidenceType patient's symptoms and status
| extras       | Array  | optional | ?
| evaluated_at | String | optional | Time when evidence was observed in ISO 8601 format. Example: 2017-03-22

EvidenceType 

| Field       | Type   | Required | Description
|-------------|--------|----------|--------------|
| id          | String | required | Symptom's ID (see getAllSymptoms)
| choice_id   | String | required | One of: present, absent or unknown
| observed_at | String | optional | Time when evidence was observed in ISO 8601 format. Example: 2017-03-22
```json
{
  "sex": "male",
  "age": 30,
  "evidence": [
    {
      "id": "s_1193",
      "choice_id": "present"
    },
    {
      "id": "s_488",
      "choice_id": "present"
    },
    {
      "id": "s_418",
      "choice_id": "present"
    }
  ]
}
```