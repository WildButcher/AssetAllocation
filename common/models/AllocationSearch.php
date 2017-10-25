<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Allocation;

/**
 * AllocationSearch represents the model behind the search form about `common\models\Allocation`.
 */
class AllocationSearch extends Allocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'downcount', 'isshare', 'lid', 'status', 'oid'], 'integer'],
            [['filename', 'createtime', 'publictime', 'filelinks', 'filecontent'], 'safe'],
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

        return $dataProvider;
    }
}
