<?php

namespace Xenokore\OSRS\StatsGenerator;

/**
 * The Skills class which holds the skill levels
 */
class Skills
{

    /**
     * Skill levels
     *
     * @var array
     */
    private $skills = [
        "attack"       => [1,1],
        "defence"      => [1,1],
        "strength"     => [1,1],
        "hitpoints"    => [10,10],
        "ranged"       => [1,1],
        "prayer"       => [1,1],
        "magic"        => [1,1],
        "cooking"      => [1,1],
        "woodcutting"  => [1,1],
        "fletching"    => [1,1],
        "fishing"      => [1,1],
        "firemaking"   => [1,1],
        "crafting"     => [1,1],
        "smithing"     => [1,1],
        "mining"       => [1,1],
        "herblore"     => [1,1],
        "agility"      => [1,1],
        "thieving"     => [1,1],
        "slayer"       => [1,1],
        "farming"      => [1,1],
        "runecraft"    => [1,1],
        "hunter"       => [1,1],
        "construction" => [1,1],
    ];

    /**
     * Constructor. Pass skill data to be used.
     *
     * @param array $skill_data
     * 
     * @return void
     */
    public function __construct(array $skill_data = [])
    {
        $this->setSkills($skill_data);
    }

    /**
     * Set skill data to be used.
     *
     * @param array $skills
     * 
     * @return void
     */
    public function setSkills(array $skills)
    {
        foreach ($skills as $skill => $levels){

            $skill = \strtolower($skill);

            $this->setSkill($skill, $levels);
        }
    }

    /**
     * Set skill data for a single skill to be used.
     * Can be passed an array of "<current_lvl>,<max_lvl>"
     * or "<level>" as a string or integer.
     *
     * @param string               $skill
     * @param array|string|integer $levels
     * 
     * @return void
     */
    public function setSkill(String $skill, $levels)
    {
        if (!isset($this->skills[$skill])) {
            throw new \Exception("invalid skill: $skill");
        }

        if (\is_int($levels)) {
            $this->skills[$skill] = [
                0 => $levels,
                1 => $levels
            ];

            return;
        }

        // Handle "<current_lvl>,<max_lvl>" and "<level>" strings/ints
        if (\is_string($levels)) {
            $temp = \explode(',', $levels);
            if (\count($temp) === 1 && \is_numeric($temp[0])) {
                $temp = [
                    0 => (int)$temp[0],
                    1 => (int)$temp[0],
                ];
            } elseif (\count($temp) !== 2 || !\is_numeric($temp[0]) || !\is_numeric($temp[1])) {
                throw new \Exception("invalid data for *$skill*, should match: (string)<current_lvl>,<max_lvl>");
            }
            $levels = [
                0 => (int)$temp[0],
                1 => (int)$temp[1]
            ];
        }
        
        // Handle <current_lvl>,<max_lvl> arrays
        if (!\is_array($levels) || !isset($levels[0]) || !isset($levels[1])) {
            throw new \Exception("invalid data for *$skill*, should match: (array)[0 => <current_lvl>, 1 => <max_lvl>]");
        }

        $this->skills[$skill] = [
            0 => (int)$levels[0],
            1 => (int)$levels[1]
        ];
    }

    /**
     * Calculate and return total level base on set skills.
     *
     * @return integer
     */
    public function getTotal(): int
    {
        $total = 0;

        foreach ($this->skills as $skill => $levels) {
            $total += $levels[1];
        }

        return $total;
    }

    /**
     * Get the set <current_lvl>,<max_lvl> as an array for a given skill.
     *
     * @param string $skill
     * 
     * @return array
     */
    public function getSkill(string $skill): array
    {
        if (!isset($this->skills[$skill])) {
            throw new \Exception("invalid skill: *$skill*");
            return 0;
        }

        return $this->skills[$skill];
    }

    /**
     * Get the set <current_lvl>,<max_lvl> as an array for all skills.
     *
     * @return array
     */
    public function getAllSkills(): array
    {
        $skills = $this->skills;
        $skills['total'] = $this->getTotal();
        return $skills;
    }
}
