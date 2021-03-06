<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Adviser;

/**
 * AdviserSearch represents the model behind the search form about `common\models\Adviser`.
 */
class AdviserSearch extends Adviser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['xingming', 'idnumber', 'mobliephone', 'email', 'dept','username','ischeck'], 'safe'],
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
        $query = Adviser::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => ['pageSize' => 10],
        	'sort' => [
        				'defaultOrder' => [
        						'ischeck'=>SORT_ASC,
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
        ]);

        $query->andFilterWhere(['like', 'xingming', $this->xingming])
            ->andFilterWhere(['like', 'idnumber', $this->idnumber])
            ->andFilterWhere(['like', 'mobliephone', $this->mobliephone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'dept', $this->dept]);

        return $dataProvider;
    }
}
