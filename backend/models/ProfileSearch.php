<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `frontend\models\Profile`.
 */
class ProfileSearch extends Profile
{
    public $genderName;
    public $gender_id;
    public $userId;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender_id'], 'integer'],
            [['first_name', 'last_name', 'birthdate', 'genderName', 'userId'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'gender_id' => 'Gender',
        ];
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Profile::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'first_name',
                'last_name',
                'birthdate',
                'genderName' => [
                    'asc' => ['gender.gender_name' => SORT_ASC],
                    'desc' => ['gender.gender_name' => SORT_DESC],
                    'label' => 'Gender',
                ],
                'profileIdLink' => [
                    'asc' => ['profile.id' => SORT_ASC],
                    'desc' => ['Profile.id' => SORT_DESC],
                    'label' => 'ID',
                ],
                'serLink' => [
                    'asc' => ['user.username' => SORT_ASC],
                    'desc' => ['user.username' => SORT_DESC],
                    'lable' => 'User',
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['gender]'])
                ->joinWith(['user']);

            return $dataProvider;
        }

        $this->addSearchParameter($query, 'profile.id');
        $this->addSearchParameter($query, 'first_name', true);
        $this->addSearchParameter($query, 'last_name', true);
        $this->addSearchParameter($query, 'birthday');
        $this->addSearchParameter($query, 'gender_id');
        $this->addSearchParameter($query, 'created_at');
        $this->addSearchParameter($query, 'updated_at');
        $this->addSearchParameter($query, 'user_id');

        // filter by gender name

        $query->joinWith(['gender' => function ($q) {
            $q->where('gender.gender_name LIKE "%' . $this->genderName . '%"');
        }])
            // filter by profile
            ->joinWith(['user' => function ($q) {
                $q->where('user.id LIKE "%' . $this->userId . '%"');
            }]);

        return $dataProvider;
    }

    /**
     * @param $query
     * @param $attribute
     * @param bool $partialMatch
     */
    protected function addSearchParameter($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->modelAttribute;
        if (trim($value) === '') {
            return;
        }

        /**
         * The following line is additionally added for right aliasing
         * of colums so filtering happen correctly in the self join
         */
        $attribute = "profile.$attribute";
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }


    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
}
