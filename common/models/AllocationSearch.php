<?php

namespace common\models;

use Yii;
use common\models\Allocation;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AllocationSearch represents the model behind the search form about `common\models\Allocation`.
 */
class AllocationSearch extends Allocation
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
            [['id', 'downcount', 'isshare', 'lid', 'status', 'oid'], 'integer'],
            [['filename', 'createtime', 'publictime', 'filelinks', 'filecontent','oname'], 'safe'],
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
        $query = Allocation::find();
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
            'publictime' => $this->publictime,
            'downcount' => $this->downcount,
            'isshare' => $this->isshare,
            'lid' => $this->lid,
            'status' => $this->status,
            'oid' => $this->oid,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'filelinks', $this->filelinks])
            ->andFilterWhere(['like', 'filecontent', $this->filecontent]);
        
        $query->join('INNER JOIN','Adviser','allocation.oid = Adviser.id');
        $query->andFilterWhere(['like','Adviser.xingming',$this->oname]);
        
        $dataProvider->sort->attributes['oname'] = 
        [
        	'asc'=>['Adviser.xingming'=>SORT_ASC],
        	'desc'=>['Adviser.xingming'=>SORT_DESC],
        ];

        return $dataProvider;
    }
    
    public function search2($params)
    {
    	$query = Allocation::find();
    	$query->join('INNER JOIN','Syscode','Syscode.id = allocation.status and Syscode.majorcode = \'status\' and Syscode.minicode = 2');
    	// add conditions that should always apply here
    	
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    			'pagination' => ['pageSize' => 10],
    			'sort' => [
    					'defaultOrder' => [
    							'publictime'=>SORT_DESC,
    					],
    			],
    	]);
    	
    	$this->load($params);
    	
    	if (!$this->validate()) {
    		// uncomment the following line if you do not want to return any records when validation fails
    		// $query->where('0=1');
    		return $dataProvider;
    	}
    	
    	return $dataProvider;
    }
    
    public function searchmyself($params)
    {
    	$query = Allocation::find()->where(['oid'=>Yii::$app->getUser()->id]);
    	
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
    			'publictime' => $this->publictime,
    			'downcount' => $this->downcount,
    			'isshare' => $this->isshare,
    			'lid' => $this->lid,
    			'status' => $this->status,
    			'oid' => $this->oid,
    	]);
    	
    	$query->andFilterWhere(['like', 'filename', $this->filename])
    	->andFilterWhere(['like', 'filelinks', $this->filelinks])
    	->andFilterWhere(['like', 'filecontent', $this->filecontent]);
    	
    	$query->join('INNER JOIN','Adviser','allocation.oid = Adviser.id');
    	$query->andFilterWhere(['like','Adviser.xingming',$this->oname]);
    	
    	$dataProvider->sort->attributes['oname'] =
    	[
    			'asc'=>['Adviser.xingming'=>SORT_ASC],
    			'desc'=>['Adviser.xingming'=>SORT_DESC],
    	];
    	
    	return $dataProvider;
    }
}
