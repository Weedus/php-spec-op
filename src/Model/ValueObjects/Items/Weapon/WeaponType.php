<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 26.06.18
 * Time: 09:34
 */

namespace Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon;


use Weedus\PhpSpecOps\Model\OptionsObjectTrait;
use Weedus\PhpSpecOps\Model\ValueObjects\AbstractValueObject;

/**
 * Class WeaponType
 * @package Weedus\PhpSpecOps\Model\ValueObjects\Items\Weapon
 * @method static WeaponType PISTOL()
 * @method static WeaponType RIFLE()
 * @method static WeaponType SNIPER_RIFLE()
 * @method static WeaponType DAGGER()
 * @method static WeaponType ONE_HAND_SWORD()
 * @method static WeaponType TWO_HAND_SWORD()
 * @method static WeaponType ONE_HAND_AXE()
 * @method static WeaponType TWO_HAND_AXE()
 * @method static WeaponType STAFF()
 * @method static WeaponType WAND()
 * @method static WeaponType SHIELD()
 */
class WeaponType extends AbstractValueObject
{
    use OptionsObjectTrait;

    const PISTOL = 'pistol';
    const RIFLE = 'rifle';
    const SNIPER_RIFLE = 'sniper_rifle';
    const DAGGER = 'dagger';
    const ONE_HAND_SWORD = 'one_hand_sword';
    const TWO_HAND_SWORD = 'two_hand_sword';
    const ONE_HAND_AXE = 'one_hand_axe';
    const TWO_HAND_AXE = 'two_hand_axe';
    const STAFF = 'staff';
    const WAND = 'wand';
    const SHIELD = 'shield';
}