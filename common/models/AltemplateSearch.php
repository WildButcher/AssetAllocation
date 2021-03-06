<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Altemplate;

/**
 * AltemplateSearch represents the model behind the search form about `common\models\Altemplate`.
 */
class AltemplateSearch extends Altemplate
{
	
	public function attributes()
	{
		return array_merge(parent::attributes(),['oname']);
	}
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isshare', 'oid', 'status'], 'integer'],
            [['templatename', 'createtime', 'filecontent','oname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Altemplate::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => ['pageSize' => 10],
        	'sort' => [
        				'defaultOrder' => [
        									'id'=>SORT_DESC,
        			  					  ],
        	          ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'createtime' => $this->createtime,
            'isshare' => $this->isshare,
            'oid' => $this->oid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'templatename', $this->templatename])
            ->andFilterWhere(['like', 'filecontent', $this->filecontent]);

            
        $query->join('INNER JOIN','adviser','altemplate.oid = adviser.id');
        $query->andFilterWhere(['like','adviser.xingming',$this->oname]);
            
        $dataProvider->sort->attributes['oname'] =
            [
            		'asc'=>['adviser.xingming'=>SORT_ASC],
            		'desc'=>['adviser.xingming'=>SORT_DESC],
            ];
            
        return $dataProvider;
    }
}
