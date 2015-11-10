<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * EventSearch represents the model behind the search form about `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_zal', 'id_client', 'id_users', 'id_users1', 'status', 'updated_at', 'created_at'], 'integer'],
            [['date_event', 'name_event', 'oborud', 'time_event', 'kofebrayk', 'furshet', 'dopinfo'], 'safe'],
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
    public function search($params,$today)
    {



        $query = Event::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['date_event'=>SORT_DESC,'time_event'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_zal' => $this->id_zal,
            'id_client' => $this->id_client,
            'id_users' => $this->id_users,
            'id_users1' => $this->id_users1,
            'date_event' => $this->date_event,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name_event', $this->name_event])
            ->andFilterWhere(['like', 'oborud', $this->oborud])
            ->andFilterWhere(['like', 'time_event', $this->time_event])
            ->andFilterWhere(['like', 'kofebrayk', $this->kofebrayk])
            ->andFilterWhere(['like', 'furshet', $this->furshet])
            ->andFilterWhere(['like', 'dopinfo', $this->dopinfo])
            ->andFilterWhere(['like', 'date_event', $today])
        ;


        return $dataProvider;
    }
}
